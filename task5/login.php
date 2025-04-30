<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

$user = 'u68753'; 
$pass = '7341220';
try {
    $db = new PDO('mysql:host=localhost;dbname=u68753;charset=utf8mb4', $user, $pass, [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_SESSION['login'])) {
        // если уже вошли — выход
        session_destroy();
        header('Location: index.php');
        exit();
    }
    // форма входа
    echo '<form action="" method="post">
        <label>Логин: <input name="login" required></label><br>
        <label>Пароль: <input type="password" name="pass" required></label><br>
        <input type="submit" value="Войти">
    </form>';
    exit();
}

// POST — проверка
$login = $_POST['login'] ?? '';
$passw = $_POST['pass'] ?? '';
// найдём пользователя
$stmt = $db->prepare("SELECT ua.application_id, ua.password_hash
    FROM user_auth ua WHERE ua.login=?");
$stmt->execute([$login]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row || !password_verify($passw, $row['password_hash'])) {
    echo '<div class="error">Неверный логин или пароль.</div>';
    echo '<p><a href="login.php">Попробовать снова</a></p>';
    exit();
}
// успешный вход
$_SESSION['login'] = $login;
$_SESSION['uid']   = $row['application_id'];
header('Location: index.php');
exit();