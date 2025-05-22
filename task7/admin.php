<?php
header('Content-Type: text/html; charset=UTF-8');
session_start(); // ИЗМЕНЕНО: добавлен session_start для доступа к CSRF-токену

require_once 'db.php';

// === HTTP Basic Auth ===
if (empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Admin Area"');
    exit('<h1>401 Требуется авторизация</h1>');
}

try {
    $stmt = $db->prepare("SELECT password_hash FROM admin_auth WHERE login = ?");
    $stmt->execute([$_SERVER['PHP_AUTH_USER']]);
    $hash = $stmt->fetchColumn();
} catch (PDOException $e) {
    // ИЗМЕНЕНО: логируем ошибку и показываем общую страницу 500
    if (!is_dir(__DIR__ . '/logs')) {
        mkdir(__DIR__ . '/logs', 0700, true);
    }
    error_log(date('Y-m-d H:i:s') . " | Admin auth query error: {$e->getMessage()}\n", 3, __DIR__ . '/logs/sql_errors.log');
    header('HTTP/1.1 500 Internal Server Error');
    exit('<h1>500 Ошибка сервиса</h1>');
}

if (!$hash || !password_verify($_SERVER['PHP_AUTH_PW'], $hash)) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Admin Area"');
    exit('<h1>401 Неверный логин или пароль</h1>');
}

// === ОБРАБОТКА POST: удаление заявки ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    // ИЗМЕНЕНО: проверка CSRF-токена перед удалением
    if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        http_response_code(403);
        exit('Ошибка проверки безопасности (CSRF).');
    }
    $delId = (int)$_POST['delete_id'];
    if ($delId > 0) {
        try {
            $db->prepare("DELETE FROM application WHERE id = ?")->execute([$delId]);
        } catch (PDOException $e) {
            // ИЗМЕНЕНО: логируем возможную ошибку при удалении
            error_log(date('Y-m-d H:i:s') . " | Delete application error: {$e->getMessage()}\n", 3, __DIR__ . '/logs/sql_errors.log');
        }
    }
    header('Location: admin.php');
    exit();
}

// === ОБРАБОТКА GET+POST: редактирование заявки ===
if (!empty($_GET['edit'])) {
    $editId = (int)$_GET['edit'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // ИЗМЕНЕНО: проверка CSRF-токена перед обновлением
        if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            http_response_code(403);
            exit('Ошибка проверки безопасности (CSRF).');
        }
        try {
            $db->prepare("UPDATE application SET fio=?, phone=?, email=?, birth_date=?, gender=?, bio=? WHERE id=?")
               ->execute([
                   trim($_POST['fio']), trim($_POST['phone']), trim($_POST['email']),
                   $_POST['birth_date'], $_POST['gender'], trim($_POST['bio']),
                   $editId
               ]);
        } catch (PDOException $e) {
            // ИЗМЕНЕНО: логируем возможную ошибку при UPDATE
            error_log(date('Y-m-d H:i:s') . " | Update application error: {$e->getMessage()}\n", 3, __DIR__ . '/logs/sql_errors.log');
        }

        // Обновляем таблицу application_language
        $db->prepare("DELETE FROM application_language WHERE application_id = ?")->execute([$editId]);
        $ins = $db->prepare("INSERT INTO application_language (application_id, language_id) VALUES (?, ?)");
        $sel = $db->prepare("SELECT id FROM programming_languages WHERE language_name = ?");
        foreach ($_POST['languages'] as $lng) {
            $sel->execute([$lng]);
            if ($lid = $sel->fetchColumn()) {
                $ins->execute([$editId, $lid]);
            }
        }
        header('Location: admin.php');
        exit();
    }

    // Получаем данные заявки для вывода в форму
    $app = $db->prepare("SELECT * FROM application WHERE id = ?");
    $app->execute([$editId]);
    $data = $app->fetch(PDO::FETCH_ASSOC);

    $langsSel = $db->prepare("SELECT pl.language_name FROM programming_languages pl
                               JOIN application_language al ON pl.id=al.language_id
                              WHERE al.application_id = ?");
    $langsSel->execute([$editId]);
    $selected = $langsSel->fetchAll(PDO::FETCH_COLUMN);
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head><meta charset="UTF-8"><title>Редактировать заявку</title>
      <link rel="stylesheet" href="style.css">
    </head><body><div class="container">
      <h1>Редактировать #<?= htmlspecialchars($data['id'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></h1>
      <form method="post" action="admin.php?edit=<?= htmlspecialchars($data['id'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">
        <!-- ИЗМЕНЕНО: добавлено скрытое поле CSRF-токена -->
        <input type="hidden" name="csrf_token"
               value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">

        <label>ФИО:<input name="fio" required
            value="<?= htmlspecialchars($data['fio'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>"></label>
        <label>Телефон:<input name="phone" required
            value="<?= htmlspecialchars($data['phone'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>"></label>
        <label>Email:<input name="email" required
            value="<?= htmlspecialchars($data['email'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>"></label>
        <label>Дата рождения:<input type="date" name="birth_date" required
            value="<?= htmlspecialchars($data['birth_date'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>"></label>
        <p>Пол:</p>
        <?php foreach (['Мужской','Женский'] as $g): ?>
          <label><input type="radio" name="gender" value="<?= htmlspecialchars($g, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>"
              <?= $data['gender'] === $g ? 'checked' : '' ?>><?= htmlspecialchars($g, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></label>
        <?php endforeach; ?>
        <label>Биография:<textarea name="bio" required><?= htmlspecialchars($data['bio'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></textarea></label>
        <label>Языки:<select name="languages[]" multiple required>
          <?php
            $all = ['Pascal','C','C++','JavaScript','PHP','Python','Java','Haskel','Clojure','Prolog','Scala','Go'];
            foreach ($all as $lang): ?>
            <option value="<?= htmlspecialchars($lang, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>"
              <?= in_array($lang, $selected, true) ? 'selected' : '' ?>>
              <?= htmlspecialchars($lang, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>
            </option>
          <?php endforeach; ?>
        </select></label>
        <input type="submit" value="Сохранить">
      </form>
    </div></body></html>
    <?php exit();
}

// Выводим список всех заявок
$apps = fetchAllApplications($db);
$stats = fetchLanguagesStats($db);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Администратор</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <div class="container">
    <h1>Администратор</h1>
    <h2>Заявки пользователей</h2>
    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Дата рождения</th>
            <th>Пол</th>
            <th>Биография</th>
            <th>Языки</th>
            <th>Действия</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($apps as $r): ?>
          <tr>
            <td><?= htmlspecialchars($r['id'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['fio'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['phone'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['email'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['birth_date'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['gender'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['bio'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['languages'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></td>
            <td>
              <a class="table-action edit" href="admin.php?edit=<?= htmlspecialchars($r['id'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">Редактировать</a>
              <!-- ИЗМЕНЕНО: удаление через POST-форму с CSRF-защитой -->
              <form method="POST" action="admin.php" style="display:inline;" onsubmit="return confirm('Удалить заявку #<?= htmlspecialchars($r['id'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>?');">
                <input type="hidden" name="delete_id" value="<?= htmlspecialchars($r['id'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">
                <button type="submit" class="table-action delete">Удалить</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <h2>Статистика по языкам</h2>
    <ul class="stats-list">
      <?php foreach($stats as $s): ?>
        <li><?= htmlspecialchars($s['language_name'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>: <?= htmlspecialchars($s['cnt'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?> чел.</li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>
