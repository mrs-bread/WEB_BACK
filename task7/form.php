<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Форма</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Форма</h1>
    <?php
      if (!empty($messages)) {
          echo '<div id="messages">';
          foreach ($messages as $msg) {
              echo $msg; // Сообщения уже содержат экранированный контент
          }
          echo '</div>';
      }
    ?>
    <form action="index.php" method="POST">
      <!-- ИЗМЕНЕНО: добавлено скрытое поле CSRF-токена -->
      <input type="hidden" name="csrf_token"
             value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">

      <label for="fio">ФИО:</label>
      <input type="text" id="fio" name="fio" placeholder="Введите ФИО" required
        <?php if (!empty($errors['fio'])) echo 'class="error"'; ?>
        value="<?= htmlspecialchars($values['fio'] ?? '', ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">
      <!-- ИЗМЕНЕНО: к value добавлено htmlspecialchars для защиты от XSS -->

      <label for="phone">Телефон:</label>
      <input type="tel" id="phone" name="phone" placeholder="Введите номер телефона" required
        <?php if (!empty($errors['phone'])) echo 'class="error"'; ?>
        value="<?= htmlspecialchars($values['phone'] ?? '', ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">
      <!-- ИЗМЕНЕНО: к value добавлено htmlspecialchars -->

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="example@mail.com" required
        <?php if (!empty($errors['email'])) echo 'class="error"'; ?>
        value="<?= htmlspecialchars($values['email'] ?? '', ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">
      <!-- ИЗМЕНЕНО: к value добавлено htmlspecialchars -->

      <label for="birth_date">Дата рождения:</label>
      <input type="date" id="birth_date" name="birth_date" required
        <?php if (!empty($errors['birth_date'])) echo 'class="error"'; ?>
        value="<?= htmlspecialchars($values['birth_date'] ?? '', ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>">
      <!-- ИЗМЕНЕНО: к value добавлено htmlspecialchars -->

      <p>Пол:</p>
      <div>
        <?php foreach (['Мужской','Женский'] as $g): ?>
        <label>
          <input type="radio" name="gender" value="<?= htmlspecialchars($g, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>"
            <?= (isset($values['gender']) && $values['gender'] === $g) ? 'checked' : '' ?>
            <?php if (!empty($errors['gender'])) echo 'class="error"'; ?>>
          <?= htmlspecialchars($g, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?>
        </label>
        <?php endforeach; ?>
        <!-- ИЗМЕНЕНО: value и текст метки экранируются htmlspecialchars -->
      </div>

      <label for="languages">Любимый язык программирования:</label>
      <select id="languages" name="languages[]" multiple required
        <?php if (!empty($errors['languages'])) echo 'class="error"'; ?>>
        <?php 
          $langs = ['Pascal', 'C', 'C++', 'JavaScript', 'PHP', 'Python', 'Java', 'Haskel', 'Clojure', 'Prolog', 'Scala', 'Go'];
          $sel = $values['languages'] ?? [];
          foreach ($langs as $lang) {
              printf(
                '<option value="%s"%s>%s</option>',
                htmlspecialchars($lang, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'),
                in_array($lang, $sel) ? ' selected' : '',
                htmlspecialchars($lang, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8')
              );
              // ИЗМЕНЕНО: value и текст опций экранируются htmlspecialchars
          }
        ?>
      </select>

      <label for="bio">Биография:</label>
      <textarea id="bio" name="bio" rows="5" placeholder="Расскажите о себе" required
        <?php if (!empty($errors['bio'])) echo 'class="error"'; ?>><?= 
        htmlspecialchars($values['bio'] ?? '', ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') ?></textarea>
      <!-- ИЗМЕНЕНО: содержимое textarea экранируется htmlspecialchars -->

      <label>
        <input type="checkbox" name="contract" value="1" required
          <?php if (!empty($errors['contract'])) echo 'class="error"'; ?>>
        Я ознакомлен(а) с контрактом
      </label>
      <!-- Поле контракта осталось без изменений, кроме условного класса для ошибки -->

      <input type="submit" value="Сохранить">
    </form>
  </div>
</body>
</html>
