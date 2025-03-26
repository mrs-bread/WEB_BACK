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
          foreach ($messages as $msg) {
              echo $msg;
          }
      }
    ?>
    <form action="index.php" method="POST">
      <label for="fio">ФИО:</label>
      <input type="text" id="fio" name="fio" placeholder="Введите ФИО" required
        <?php if (!empty($errors['fio'])) echo 'class="error"'; ?>
        value="<?php echo isset($values['fio']) ? htmlspecialchars($values['fio']) : ''; ?>">
      
      <label for="phone">Телефон:</label>
      <input type="tel" id="phone" name="phone" placeholder="Введите номер телефона" required
        <?php if (!empty($errors['phone'])) echo 'class="error"'; ?>
        value="<?php echo isset($values['phone']) ? htmlspecialchars($values['phone']) : ''; ?>">
      
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="example@mail.com" required
        <?php if (!empty($errors['email'])) echo 'class="error"'; ?>
        value="<?php echo isset($values['email']) ? htmlspecialchars($values['email']) : ''; ?>">
      
      <label for="birth_date">Дата рождения:</label>
      <input type="date" id="birth_date" name="birth_date" required
        <?php if (!empty($errors['birth_date'])) echo 'class="error"'; ?>
        value="<?php echo isset($values['birth_date']) ? htmlspecialchars($values['birth_date']) : ''; ?>">
      
      <p>Пол:</p>
      <div>
        <label>
          <input type="radio" name="gender" value="Мужской"
            <?php echo (isset($values['gender']) && $values['gender'] == 'Мужской') ? 'checked' : ''; ?>
            <?php if (!empty($errors['gender'])) echo 'class="error"'; ?>
          > Мужской
        </label>
        <label>
          <input type="radio" name="gender" value="Женский"
            <?php echo (isset($values['gender']) && $values['gender'] == 'Женский') ? 'checked' : ''; ?>
            <?php if (!empty($errors['gender'])) echo 'class="error"'; ?>
          > Женский
        </label>
      </div>
      
      <label for="languages">Любимый язык программирования:</label>
      <select id="languages" name="languages[]" multiple required <?php if (!empty($errors['languages'])) echo 'class="error"'; ?>>
        <?php 
          $langs = ['Pascal', 'C', 'C++', 'JavaScript', 'PHP', 'Python', 'Java', 'Haskel', 'Clojure', 'Prolog', 'Scala', 'Go'];
          $selected = isset($values['languages']) ? $values['languages'] : array();
          foreach($langs as $lang) {
              $isSelected = in_array($lang, $selected) ? 'selected' : '';
              echo "<option value=\"$lang\" $isSelected>$lang</option>";
          }
        ?>
      </select>
      
      <label for="bio">Биография:</label>
      <textarea id="bio" name="bio" rows="5" placeholder="Расскажите о себе" required <?php if (!empty($errors['bio'])) echo 'class="error"'; ?>><?php echo isset($values['bio']) ? htmlspecialchars($values['bio']) : ''; ?></textarea>
      
      <label>
        <input type="checkbox" name="contract" value="1" required <?php if (!empty($errors['contract'])) echo 'class="error"'; ?>>
        Я ознакомлен(а) с контрактом
      </label>
      
      <input type="submit" value="Сохранить">
    </form>
  </div>
</body>
</html>