<?php
header('Content-Type: text/html; charset=UTF-8');
session_start(); // ИЗМЕНЕНО: оставляем session_start для единообразия и возможности расширения

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_SESSION['login'])) {
        session_destroy();
        header('Location: index.php');
        exit();
    }
    echo '<form action="" method="post">
        <label>Логин: <input name="login" required></label><br>
        <label>Пароль: <input type="password" name="pass" required></label><br>
        <input type="submit" value="Войти">
    </form>';
    exit();
}

$login = $_POST['login'] ?? '';
$passw = $_POST['pass']  ?? '';

// ИЗМЕНЕНО: добавлен блок try/catch для обработки возможных ошибок PDO и логирования
try {
    $stmt = $db->prepare("SELECT application_id, password_hash
        FROM user_auth WHERE login = ?");
    $stmt->execute([$login]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // ИЗМЕНЕНО: логируем внутреннюю ошибку, не показываем пользователю детали
    if (!is_dir(__DIR__ . '/logs')) {
        mkdir(__DIR__ . '/logs', 0700, true);
    }
    error_log(date('Y-m-d H:i:s') . " | Login query error: {$e->getMessage()}\n", 3, __DIR__ . '/logs/sql_errors.log');
    echo '<div class="error">Неверный логин или пароль.</div>';
    echo '<p><a href="login.php">Попробовать снова</a></p>';
    exit();
}

if (!$row || !password_verify($passw, $row['password_hash'])) {
    echo '<div class="error">Неверный логин или пароль.</div>';
    echo '<p><a href="login.php">Попробовать снова</a></p>';
    exit();
}

$_SESSION['login'] = $login;
$_SESSION['uid']   = $row['application_id'];
header('Location: index.php');
exit();
