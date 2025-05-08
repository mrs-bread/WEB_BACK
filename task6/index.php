<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $messages = [];
    if (!empty($_COOKIE['save'])) {
        setcookie('save', '', time() - 3600);
        $messages[] = '<div class="success">Спасибо, результаты сохранены.</div>';
        if (!empty($_COOKIE['login']) && !empty($_COOKIE['pass'])) {
            $messages[] = sprintf(
                '<div class="success">Вы можете <a href="login.php">войти</a> с логином <strong>%s</strong> и паролем <strong>%s</strong>.</div>',
                htmlspecialchars($_COOKIE['login']),
                htmlspecialchars($_COOKIE['pass'])
            );
            setcookie('login', '', time() - 3600);
            setcookie('pass', '', time() - 3600);
        }
    }

    $fields = ['fio','phone','email','birth_date','gender','languages','bio','contract'];
    $errors = [];
    foreach ($fields as $f) {
        if (!empty($_COOKIE["{$f}_error"])) {
            $errors[$f] = true;
            setcookie("{$f}_error",'', time() - 3600);
            $messages[] = "<div class=\"error\">Ошибка в поле «{$f}».</div>";
        }
    }

    $values = [];
    if (!empty($_SESSION['login']) && !empty($_SESSION['uid'])) {
        $stmt = $db->prepare("SELECT a.*, GROUP_CONCAT(pl.language_name) AS langs
            FROM application a
            LEFT JOIN application_language al ON a.id=al.application_id
            LEFT JOIN programming_languages pl ON al.language_id=pl.id
            WHERE a.id=? GROUP BY a.id");
        $stmt->execute([$_SESSION['uid']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $values = [
                'fio'        => $row['fio'],
                'phone'      => $row['phone'],
                'email'      => $row['email'],
                'birth_date' => $row['birth_date'],
                'gender'     => $row['gender'],
                'bio'        => $row['bio'],
                'languages'  => explode(',', $row['langs']),
            ];
        }
    } else {
        foreach ($fields as $f) {
            if ($f === 'languages') {
                $values[$f] = empty($_COOKIE["{$f}_value"]) ? [] : json_decode($_COOKIE["{$f}_value"], true);
            } elseif ($f !== 'contract') {
                $values[$f] = $_COOKIE["{$f}_value"] ?? '';
            }
        }
    }

    include 'form.php';
    exit();
}

$errorsFlag = false;
function setVal($n, $v) { setcookie("{$n}_value", $v, time()+30*24*3600); }

if (
    empty($_POST['fio'])
    || strlen(trim($_POST['fio'])) > 150
    || !preg_match('/^[\p{L} ]+$/u', trim($_POST['fio']))
) {
    setcookie('fio_error','1', time() + 86400);
    $errorsFlag = true;
}
setVal('fio', $_POST['fio']);

if (empty($_POST['phone']) || !preg_match('/^\+?[0-9\s\-]+$/', trim($_POST['phone']))) {
    setcookie('phone_error','1',time()+86400); $errorsFlag = true;
}
setVal('phone', $_POST['phone']);

if (empty($_POST['email']) || !filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
    setcookie('email_error','1',time()+86400); $errorsFlag = true;
}
setVal('email', $_POST['email']);

if (empty($_POST['birth_date']) || !strtotime($_POST['birth_date'])) {
    setcookie('birth_date_error','1',time()+86400); $errorsFlag = true;
}
setVal('birth_date', $_POST['birth_date']);

$genders = ['Мужской','Женский'];
if (empty($_POST['gender']) || !in_array($_POST['gender'], $genders)) {
    setcookie('gender_error','1',time()+86400); $errorsFlag = true;
} else {
    setVal('gender', $_POST['gender']);
}

$langsAllowed = ['Pascal','C','C++','JavaScript','PHP','Python','Java','Haskel','Clojure','Prolog','Scala','Go'];
if (empty($_POST['languages']) || !is_array($_POST['languages'])) {
    setcookie('languages_error','1',time()+86400); $errorsFlag = true;
} else {
    foreach ($_POST['languages'] as $l) {
        if (!in_array($l, $langsAllowed)) {
            setcookie('languages_error','1',time()+86400); $errorsFlag = true;
            break;
        }
    }
    setcookie('languages_value', json_encode($_POST['languages']), time()+30*24*3600);
}

if (empty($_POST['bio'])) {
    setcookie('bio_error','1',time()+86400); $errorsFlag = true;
}
setVal('bio', $_POST['bio']);

if (empty($_POST['contract'])) {
    setcookie('contract_error','1',time()+86400); $errorsFlag = true;
}

if ($errorsFlag) {
    header('Location: index.php');
    exit();
}

foreach (['fio','phone','email','birth_date','gender','languages','bio','contract'] as $f) {
    setcookie("{$f}_error",'', time()-3600);
}

if (!empty($_SESSION['login']) && !empty($_SESSION['uid'])) {
    $stmt = $db->prepare("UPDATE application
        SET fio=?,phone=?,email=?,birth_date=?,gender=?,bio=?
      WHERE id=?");
    $stmt->execute([
        trim($_POST['fio']), trim($_POST['phone']), trim($_POST['email']),
        $_POST['birth_date'], $_POST['gender'], trim($_POST['bio']), $_SESSION['uid']
    ]);
    $db->prepare("DELETE FROM application_language WHERE application_id=?")
       ->execute([$_SESSION['uid']]);
    $insertLang = $db->prepare("INSERT INTO application_language (application_id,language_id) VALUES (?,?)");
    $findLang   = $db->prepare("SELECT id FROM programming_languages WHERE language_name=?");
    foreach ($_POST['languages'] as $l) {
        $findLang->execute([$l]);
        if ($lid = $findLang->fetchColumn()) {
            $insertLang->execute([$_SESSION['uid'], $lid]);
        }
    }
} else {
    $db->beginTransaction();
    $appStmt = $db->prepare("INSERT INTO application (fio,phone,email,birth_date,gender,bio)
                             VALUES (?,?,?,?,?,?)");
    $appStmt->execute([
        trim($_POST['fio']), trim($_POST['phone']), trim($_POST['email']),
        $_POST['birth_date'], $_POST['gender'], trim($_POST['bio'])
    ]);
    $appId = $db->lastInsertId();
    $linkStmt = $db->prepare("INSERT INTO application_language (application_id,language_id)
                               VALUES (?,?)");
    $findLang = $db->prepare("SELECT id FROM programming_languages WHERE language_name=?");
    foreach ($_POST['languages'] as $l) {
        $findLang->execute([$l]);
        if ($lid = $findLang->fetchColumn()) {
            $linkStmt->execute([$appId, $lid]);
        }
    }
    do {
        $login = 'u'.substr(md5(uniqid('', true)), 0, 8);
        $chk   = $db->prepare("SELECT COUNT(*) FROM user_auth WHERE login=?");
        $chk->execute([$login]);
    } while ($chk->fetchColumn() > 0);
    $pass = substr(md5(uniqid('', true)), 0, 10);
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $auth = $db->prepare("INSERT INTO user_auth (application_id,login,password_hash)
                          VALUES (?,?,?)");
    $auth->execute([$appId, $login, $hash]);
    $db->commit();
    setcookie('login', $login);
    setcookie('pass',  $pass);
}

setcookie('save','1');
header('Location: index.php');
exit();