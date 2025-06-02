<?php
require_once 'scripts/db.php';

// 1. Данные администратора:
$login       = 'admin';
$plain_pass  = '123';
$fio         = 'Администратор';
$number      = '';
$email       = '';
$bdate       = '1970-01-01';
$gender      = 'other';
$biography   = '';
$checkbox    = 0;

// 2. Генерируем хеш пароля:
$hash_password = password_hash($plain_pass, PASSWORD_DEFAULT);

// 3. Вставляем в application_project:
$stmt_app = $db->prepare("
    INSERT INTO application_project
      (fio, number, email, bdate, gender, biography, checkbox)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");
$stmt_app->execute([
    $fio,
    $number,
    $email,
    $bdate,
    $gender,
    $biography,
    $checkbox
]);

// 4. Получаем новый ID:
$new_id = $db->lastInsertId();

// 5. Вставляем в users_project:
$stmt_user = $db->prepare("
    INSERT INTO users_project
      (login, password, role, id)
    VALUES (?, ?, 'admin', ?)
");
$stmt_user->execute([
    $login,
    $hash_password,
    $new_id
]);
echo "Администратор '$login' создан, ID = $new_id\n";