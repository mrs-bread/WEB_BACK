<?php
header('Content-Type: text/html; charset=UTF-8');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbUser = 'u68753';
$dbPass = '7341220';
$dbDsn  = 'mysql:host=localhost;dbname=u68753;charset=utf8mb4';

try {
    $db = new PDO($dbDsn, $dbUser, $dbPass, [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    die('Ошибка подключения к БД: ' . $e->getMessage());
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