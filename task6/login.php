<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

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

$stmt = $db->prepare("SELECT ua.application_id, ua.password_hash
    FROM user_auth ua WHERE ua.login = ?");
$stmt->execute([$login]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row || !password_verify($passw, $row['password_hash'])) {
    echo '<div class="error">Неверный логин или пароль.</div>';
    echo '<p><a href="login.php">Попробовать снова</a></p>';
    exit();
}

$_SESSION['login'] = $login;
$_SESSION['uid']   = $row['application_id'];
header('Location: index.php');
exit();