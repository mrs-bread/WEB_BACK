<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Заявка</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Форма заявки</h1>
    <form action="index.php" method="POST">
      <label for="fio">ФИО:</label>
      <input type="text" id="fio" name="fio" placeholder="Введите ФИО" required>

      <label for="phone">Телефон:</label>
      <input type="tel" id="phone" name="phone" placeholder="Введите номер телефона" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="example@mail.com" required>

      <label for="birth_date">Дата рождения:</label>
      <input type="date" id="birth_date" name="birth_date" required>

      <p>Пол:</p>
      <div class="radio-group">
        <label><input type="radio" name="gender" value="Мужской" required> Мужской</label>
        <label><input type="radio" name="gender" value="Женский" required> Женский</label>
      </div>

      <label for="languages">Любимый язык программирования:</label>
      <select id="languages" name="languages[]" multiple required>
        <option value="Pascal">Pascal</option>
        <option value="C">C</option>
        <option value="C++">C++</option>
        <option value="JavaScript">JavaScript</option>
        <option value="PHP">PHP</option>
        <option value="Python">Python</option>
        <option value="Java">Java</option>
        <option value="Haskel">Haskel</option>
        <option value="Clojure">Clojure</option>
        <option value="Prolog">Prolog</option>
        <option value="Scala">Scala</option>
        <option value="Go">Go</option>
      </select>

      <label for="bio">Биография:</label>
      <textarea id="bio" name="bio" rows="5" placeholder="Расскажите о себе" required></textarea>

      <label>
        <input type="checkbox" name="contract" value="1" required>
        Я ознакомлен(а) с контрактом
      </label>

      <input type="submit" value="Сохранить">
    </form>
  </div>
</body>
</html>