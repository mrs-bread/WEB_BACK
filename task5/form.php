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
              echo $msg;
          }
          echo '</div>';
      }
    ?>
    <form action="index.php" method="POST">
      <label for="fio">ФИО:</label>
      <input type="text" id="fio" name="fio" placeholder="Введите ФИО" required
        <?php if (!empty($errors['fio'])) echo 'class="error"'; ?>
        value="<?php echo htmlspecialchars($values['fio'] ?? ''); ?>">

      <label for="phone">Телефон:</label>
      <input type="tel" id="phone" name="phone" placeholder="Введите номер телефона" required
        <?php if (!empty($errors['phone'])) echo 'class="error"'; ?>
        value="<?php echo htmlspecialchars($values['phone'] ?? ''); ?>">

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="example@mail.com" required
        <?php if (!empty($errors['email'])) echo 'class="error"'; ?>
        value="<?php echo htmlspecialchars($values['email'] ?? ''); ?>">

      <label for="birth_date">Дата рождения:</label>
      <input type="date" id="birth_date" name="birth_date" required
        <?php if (!empty($errors['birth_date'])) echo 'class="error"'; ?>
        value="<?php echo htmlspecialchars($values['birth_date'] ?? ''); ?>">

      <p>Пол:</p>
      <div>
        <?php foreach (['Мужской','Женский'] as $g): ?>
        <label>
          <input type="radio" name="gender" value="<?php echo $g; ?>"
            <?php echo (isset($values['gender']) && $values['gender']==$g) ? 'checked' : ''; ?>
            <?php if (!empty($errors['gender'])) echo 'class="error"'; ?>>
          <?php echo $g; ?>
        </label>
        <?php endforeach; ?>
      </div>

      <label for="languages">Любимый язык программирования:</label>
      <select id="languages" name="languages[]" multiple required <?php if (!empty($errors['languages'])) echo 'class="error"'; ?>>
        <?php 
          $langs = ['Pascal', 'C', 'C++', 'JavaScript', 'PHP', 'Python', 'Java', 'Haskel', 'Clojure', 'Prolog', 'Scala', 'Go'];
          $sel = $values['languages'] ?? [];
          foreach ($langs as $lang) {
              printf('<option value="%s"%s>%s</option>',
                $lang,
                in_array($lang, $sel) ? ' selected' : '',
                $lang
              );
          }
        ?>
      </select>

      <label for="bio">Биография:</label>
      <textarea id="bio" name="bio" rows="5" placeholder="Расскажите о себе" required <?php if (!empty($errors['bio'])) echo 'class="error"'; ?>><?php echo htmlspecialchars($values['bio'] ?? ''); ?></textarea>

      <label>
        <input type="checkbox" name="contract" value="1" required <?php if (!empty($errors['contract'])) echo 'class="error"'; ?>>
        Я ознакомлен(а) с контрактом
      </label>

      <input type="submit" value="Сохранить">
    </form>
  </div>
</body>
</html>