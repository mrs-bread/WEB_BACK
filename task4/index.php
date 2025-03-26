<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $messages = array();
    if (!empty($_COOKIE['save'])) {
        setcookie('save', '', 100000);
        $messages[] = '<div class="success">Спасибо, результаты сохранены.</div>';
    }
    
    $errors = array();
    $errors['fio'] = !empty($_COOKIE['fio_error']);
    $errors['phone'] = !empty($_COOKIE['phone_error']);
    $errors['email'] = !empty($_COOKIE['email_error']);
    $errors['birth_date'] = !empty($_COOKIE['birth_date_error']);
    $errors['gender'] = !empty($_COOKIE['gender_error']);
    $errors['languages'] = !empty($_COOKIE['languages_error']);
    $errors['bio'] = !empty($_COOKIE['bio_error']);
    $errors['contract'] = !empty($_COOKIE['contract_error']);
    
    if ($errors['fio']) {
        setcookie('fio_error', '', 100000);
        setcookie('fio_value', '', 100000);
        $messages[] = '<div class="error">ФИО должно содержать только буквы и пробелы, не более 150 символов.</div>';
    }
    if ($errors['phone']) {
        setcookie('phone_error', '', 100000);
        setcookie('phone_value', '', 100000);
        $messages[] = '<div class="error">Телефон содержит недопустимые символы.</div>';
    }
    if ($errors['email']) {
        setcookie('email_error', '', 100000);
        setcookie('email_value', '', 100000);
        $messages[] = '<div class="error">Некорректный формат e-mail.</div>';
    }
    if ($errors['birth_date']) {
        setcookie('birth_date_error', '', 100000);
        setcookie('birth_date_value', '', 100000);
        $messages[] = '<div class="error">Некорректная дата рождения.</div>';
    }
    if ($errors['gender']) {
        setcookie('gender_error', '', 100000);
        setcookie('gender_value', '', 100000);
        $messages[] = '<div class="error">Выберите пол.</div>';
    }
    if ($errors['languages']) {
        setcookie('languages_error', '', 100000);
        setcookie('languages_value', '', 100000);
        $messages[] = '<div class="error">Выберите хотя бы один язык программирования.</div>';
    }
    if ($errors['bio']) {
        setcookie('bio_error', '', 100000);
        setcookie('bio_value', '', 100000);
        $messages[] = '<div class="error">Заполните поле биографии.</div>';
    }
    if ($errors['contract']) {
        setcookie('contract_error', '', 100000);
        $messages[] = '<div class="error">Вы должны подтвердить ознакомление с контрактом.</div>';
    }
    
    $values = array();
    $values['fio'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];
    $values['phone'] = empty($_COOKIE['phone_value']) ? '' : $_COOKIE['phone_value'];
    $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
    $values['birth_date'] = empty($_COOKIE['birth_date_value']) ? '' : $_COOKIE['birth_date_value'];
    $values['gender'] = empty($_COOKIE['gender_value']) ? '' : $_COOKIE['gender_value'];
    $values['languages'] = empty($_COOKIE['languages_value']) ? array() : json_decode($_COOKIE['languages_value'], true);
    $values['bio'] = empty($_COOKIE['bio_value']) ? '' : $_COOKIE['bio_value'];
    
    include('form.php');
    exit();
} else {
    $errorsFlag = false;
    
    function setValCookie($name, $value) {
        setcookie($name, $value, time() + 30*24*60*60);
    }
    
    if (empty($_POST['fio']) || strlen(trim($_POST['fio'])) > 150 || !preg_match('/^[\p{L} ]+$/u', trim($_POST['fio']))) {
        setcookie('fio_error', '1', time() + 24*60*60);
        $errorsFlag = true;
    }
    setValCookie('fio_value', $_POST['fio']);
    
    if (empty($_POST['phone']) || !preg_match('/^\+?[0-9\s\-]+$/', trim($_POST['phone']))) {
        setcookie('phone_error', '1', time() + 24*60*60);
        $errorsFlag = true;
    }
    setValCookie('phone_value', $_POST['phone']);
    
    if (empty($_POST['email']) || !filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        setcookie('email_error', '1', time() + 24*60*60);
        $errorsFlag = true;
    }
    setValCookie('email_value', $_POST['email']);
    
    if (empty($_POST['birth_date']) || !strtotime($_POST['birth_date'])) {
        setcookie('birth_date_error', '1', time() + 24*60*60);
        $errorsFlag = true;
    }
    setValCookie('birth_date_value', $_POST['birth_date']);
    
    $allowedGenders = ['Мужской', 'Женский'];
    if (empty($_POST['gender']) || !in_array($_POST['gender'], $allowedGenders)) {
        setcookie('gender_error', '1', time() + 24*60*60);
        $errorsFlag = true;
    } else {
        setValCookie('gender_value', $_POST['gender']);
    }
    
    $allowedLanguages = ['Pascal', 'C', 'C++', 'JavaScript', 'PHP', 'Python', 'Java', 'Haskel', 'Clojure', 'Prolog', 'Scala', 'Go'];
    if (empty($_POST['languages']) || !is_array($_POST['languages'])) {
        setcookie('languages_error', '1', time() + 24*60*60);
        $errorsFlag = true;
    } else {
        foreach ($_POST['languages'] as $lang) {
            if (!in_array($lang, $allowedLanguages)) {
                setcookie('languages_error', '1', time() + 24*60*60);
                $errorsFlag = true;
                break;
            }
        }
        setcookie('languages_value', json_encode($_POST['languages']), time() + 30*24*60*60);
    }
    
    if (empty($_POST['bio'])) {
        setcookie('bio_error', '1', time() + 24*60*60);
        $errorsFlag = true;
    }
    setValCookie('bio_value', $_POST['bio']);
    
    if (empty($_POST['contract'])) {
        setcookie('contract_error', '1', time() + 24*60*60);
        $errorsFlag = true;
    }
    
    if ($errorsFlag) {
        header('Location: index.php');
        exit();
    } else {
        setcookie('fio_error', '', 100000);
        setcookie('phone_error', '', 100000);
        setcookie('email_error', '', 100000);
        setcookie('birth_date_error', '', 100000);
        setcookie('gender_error', '', 100000);
        setcookie('languages_error', '', 100000);
        setcookie('bio_error', '', 100000);
        setcookie('contract_error', '', 100000);
        
        setcookie('fio_value', $_POST['fio'], time() + 365*24*60*60);
        setcookie('phone_value', $_POST['phone'], time() + 365*24*60*60);
        setcookie('email_value', $_POST['email'], time() + 365*24*60*60);
        setcookie('birth_date_value', $_POST['birth_date'], time() + 365*24*60*60);
        setcookie('gender_value', $_POST['gender'], time() + 365*24*60*60);
        setcookie('languages_value', json_encode($_POST['languages']), time() + 365*24*60*60);
        setcookie('bio_value', $_POST['bio'], time() + 365*24*60*60);
        
        $fio = trim($_POST['fio']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $bio = trim($_POST['bio']);
        
        $user = 'u68753';
        $pass = '7341220';
        try {
            $db = new PDO('mysql:host=localhost;dbname=u68753', $user, $pass, [
                PDO::ATTR_PERSISTENT => true, 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
        
        try {
            $stmt = $db->prepare("INSERT INTO application (fio, phone, email, birth_date, gender, bio) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$fio, $phone, $email, $birth_date, $gender, $bio]);
            $appId = $db->lastInsertId();
        } catch (PDOException $e) {
            die("Ошибка сохранения заявки: " . $e->getMessage());
        }
        
        foreach ($_POST['languages'] as $lang) {
            if (in_array($lang, $allowedLanguages)) {
                try {
                    $stmt = $db->prepare("SELECT id FROM programming_languages WHERE language_name = ?");
                    $stmt->execute([$lang]);
                    $languageId = $stmt->fetchColumn();
                    if ($languageId) {
                        $stmtLink = $db->prepare("INSERT INTO application_language (application_id, language_id) VALUES (?, ?)");
                        $stmtLink->execute([$appId, $languageId]);
                    }
                } catch (PDOException $e) {
                    die("Ошибка сохранения языков программирования: " . $e->getMessage());
                }
            }
        }
        
        setcookie('save', '1');
        header('Location: index.php');
        exit();
    }
}
?>