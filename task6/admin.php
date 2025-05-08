<?php
require_once 'db.php';

if (empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Admin Area"');
    exit('<h1>401 Требуется авторизация</h1>');
}
$stmt = $db->prepare("SELECT password_hash FROM admin_auth WHERE login = ?");
$stmt->execute([$_SERVER['PHP_AUTH_USER']]);
$hash = $stmt->fetchColumn();
if (!$hash || !password_verify($_SERVER['PHP_AUTH_PW'], $hash)) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Admin Area"');
    exit('<h1>401 Неверный логин или пароль</h1>');
}

if (!empty($_GET['delete'])) {
    $delId = (int)$_GET['delete'];
    $db->prepare("DELETE FROM application WHERE id = ?")->execute([$delId]);
    header('Location: admin.php'); exit();
}

if (!empty($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $db->prepare("UPDATE application SET fio=?, phone=?, email=?, birth_date=?, gender=?, bio=? WHERE id=?")
           ->execute([
               $_POST['fio'], $_POST['phone'], $_POST['email'],
               $_POST['birth_date'], $_POST['gender'], $_POST['bio'],
               $editId
           ]);
        $db->prepare("DELETE FROM application_language WHERE application_id = ?")->execute([$editId]);
        $ins = $db->prepare("INSERT INTO application_language (application_id, language_id) VALUES (?, ?)");
        $sel = $db->prepare("SELECT id FROM programming_languages WHERE language_name = ?");
        foreach ($_POST['languages'] as $lng) {
            $sel->execute([$lng]);
            if ($lid = $sel->fetchColumn()) {
                $ins->execute([$editId, $lid]);
            }
        }
        header('Location: admin.php'); exit();
    }
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
      <h1>Редактировать #<?= $data['id'] ?></h1>
      <form method="post" action="admin.php?edit=<?= $data['id'] ?>">
        <label>ФИО:<input name="fio" required value="<?= htmlspecialchars($data['fio']) ?>"></label>
        <label>Телефон:<input name="phone" required value="<?= htmlspecialchars($data['phone']) ?>"></label>
        <label>Email:<input name="email" required value="<?= htmlspecialchars($data['email']) ?>"></label>
        <label>Дата рождения:<input type="date" name="birth_date" required value="<?= $data['birth_date'] ?>"></label>
        <p>Пол:</p><?php foreach(['Мужской','Женский'] as $g): ?>
          <label><input type="radio" name="gender" value="<?= $g ?>" <?= $data['gender']==$g?'checked':'' ?>><?= $g ?></label>
        <?php endforeach; ?>
        <label>Биография:<textarea name="bio" required><?= htmlspecialchars($data['bio']) ?></textarea></label>
        <label>Языки:<select name="languages[]" multiple required>
          <?php $all = ['Pascal','C','C++','JavaScript','PHP','Python','Java','Haskel','Clojure','Prolog','Scala','Go'];
          foreach($all as $lang): ?>
            <option <?= in_array($lang,$selected)?'selected':'' ?>><?= $lang ?></option>
          <?php endforeach; ?>
        </select></label>
        <input type="submit" value="Сохранить">
      </form>
    </div></body></html>
    <?php exit();
}

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
            <td><?= $r['id'] ?></td>
            <td><?= htmlspecialchars($r['fio']) ?></td>
            <td><?= htmlspecialchars($r['phone']) ?></td>
            <td><?= htmlspecialchars($r['email']) ?></td>
            <td><?= $r['birth_date'] ?></td>
            <td><?= $r['gender'] ?></td>
            <td><?= htmlspecialchars($r['bio']) ?></td>
            <td><?= htmlspecialchars($r['languages']) ?></td>
            <td>
              <a class="table-action edit" href="admin.php?edit=<?= $r['id'] ?>">Редактировать</a>
              <a class="table-action delete" href="admin.php?delete=<?= $r['id'] ?>" onclick="return confirm('Удалить заявку #<?= $r['id'] ?>?');">Удалить</a>
            </</details>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <h2>Статистика по языкам</h2>
    <ul class="stats-list">
      <?php foreach($stats as $s): ?>
        <li><?= htmlspecialchars($s['language_name']) ?>: <?= $s['cnt'] ?> чел.</li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>