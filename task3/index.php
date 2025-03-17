<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['save'])) {
        echo "<p>Спасибо, результаты сохранены.</p>";
    }
    include('form.php');
    exit();
}

$errors = [];

if (empty($_POST['fio'])) {
    $errors[] = "Заполните ФИО.";
} else {
    $fio = trim($_POST['fio']);
    if (strlen($fio) > 150) {
        $errors[] = "ФИО не должно превышать 150 символов.";
    }
    if (!preg_match('/^[\p{L} ]+$/u', $fio)) {
        $errors[] = "ФИО должно содержать только буквы и пробелы.";
    }
}

if (empty($_POST['phone'])) {
    $errors[] = "Заполните Телефон.";
} else {
    $phone = trim($_POST['phone']);
    if (!preg_match('/^\+?[0-9\s\-]+$/', $phone)) {
        $errors[] = "Телефон содержит недопустимые символы.";
    }
}

if (empty($_POST['email'])) {
    $errors[] = "Заполните e-mail.";
} else {
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Некорректный формат e-mail.";
    }
}

if (empty($_POST['birth_date'])) {
    $errors[] = "Заполните дату рождения.";
} else {
    $birth_date = $_POST['birth_date'];
    if (!strtotime($birth_date)) {
        $errors[] = "Некорректная дата рождения.";
    }
}

if (empty($_POST['gender'])) {
    $errors[] = "Выберите пол.";
} else {
    $gender = $_POST['gender'];
    $allowedGenders = ['Мужской', 'Женский'];
    if (!in_array($gender, $allowedGenders)) {
        $errors[] = "Недопустимое значение для пола.";
    }
}

if (empty($_POST['languages'])) {
    $errors[] = "Выберите хотя бы один любимый язык программирования.";
} else {
    $allowedLanguages = ['Pascal', 'C', 'C++', 'JavaScript', 'PHP', 'Python', 'Java', 'Haskel', 'Clojure', 'Prolog', 'Scala', 'Go'];
    $languages = $_POST['languages'];
    if (!is_array($languages)) {
        $errors[] = "Некорректные данные для языков программирования.";
    } else {
        foreach ($languages as $lang) {
            if (!in_array($lang, $allowedLanguages)) {
                $errors[] = "Недопустимый язык программирования: " . htmlspecialchars($lang);
                break;
            }
        }
    }
}

if (empty($_POST['bio'])) {
    $errors[] = "Заполните поле биографии.";
} else {
    $bio = trim($_POST['bio']);
}

if (empty($_POST['contract'])) {
    $errors[] = "Вы должны подтвердить ознакомление с контрактом.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    echo "<p><a href='javascript:history.back()'>Вернуться и исправить ошибки</a></p>";
    exit();
}

$user = 'u68753';
$pass = '7341220';
$db = new PDO('mysql:host=localhost;dbname=u68753', $user, $pass, [
    PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);

try {
    $stmt = $db->prepare("INSERT INTO application (fio, phone, email, birth_date, gender, bio) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fio, $phone, $email, $birth_date, $gender, $bio]);
    $appId = $db->lastInsertId();
} catch (PDOException $e) {
    die("Ошибка сохранения заявки: " . $e->getMessage());
}

try {
    foreach ($languages as $lang) {
        $stmt = $db->prepare("SELECT id FROM programming_languages WHERE language_name = ?");
        $stmt->execute([$lang]);
        $languageId = $stmt->fetchColumn();
        if ($languageId) {
            $stmtLink = $db->prepare("INSERT INTO application_language (application_id, language_id) VALUES (?, ?)");
            $stmtLink->execute([$appId, $languageId]);
        }
    }
} catch (PDOException $e) {
    die("Ошибка сохранения языков программирования: " . $e->getMessage());
}

header('Location: index.php?save=1');
exit();
?>