<?php
header('Content-Type: text/html; charset=UTF-8');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// === ИНИЦИАЛИЗАЦИЯ CSRF-ТOKEN ===
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$dbUser = 'u68753';
$dbPass = '7341220';
$dbDsn  = 'mysql:host=localhost;dbname=u68753;charset=utf8mb4';

try {
    // ИЗМЕНЕНО: добавлен ATTR_EMULATE_PREPARES => false для отключения эмуляции подготовленных выражений
    $db = new PDO($dbDsn, $dbUser, $dbPass, [
        PDO::ATTR_PERSISTENT       => true,
        PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    // ИЗМЕНЕНО: вместо die() с подробным сообщением — логируем ошибку и показываем обобщённое сообщение
    if (!is_dir(__DIR__ . '/logs')) {
        mkdir(__DIR__ . '/logs', 0700, true);
    }
    error_log(
        date('Y-m-d H:i:s') . ' | DB Connection Error: ' . $e->getMessage() . PHP_EOL,
        3,
        __DIR__ . '/logs/db_errors.log'
    );
    http_response_code(500);
    die('Ошибка сервиса. Попробуйте зайти позже.');
}

function fetchAllApplications(PDO $db) {
    $sql = "SELECT a.id, a.fio, a.phone, a.email, a.birth_date, a.gender, a.bio,
                   GROUP_CONCAT(pl.language_name SEPARATOR ', ') AS languages
              FROM application a
         LEFT JOIN application_language al ON a.id=al.application_id
         LEFT JOIN programming_languages pl ON al.language_id=pl.id
          GROUP BY a.id";
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function fetchLanguagesStats(PDO $db) {
    $sql = "SELECT pl.language_name, COUNT(al.application_id) AS cnt
              FROM programming_languages pl
         LEFT JOIN application_language al ON pl.id=al.language_id
             GROUP BY pl.id";
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
