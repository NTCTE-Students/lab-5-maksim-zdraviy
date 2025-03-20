<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В имени допускается использовать только символы латинского алфавита и пробел";
    }
    
    if (empty($email)) {
        $errors[] = "Электронная почта обязательна";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "У электронной почты некорректный формат";
    }

    if (empty($message)) {
        $errors[] = "Введите сообщение";
    } elseif (mb_strlen($message) < 10) {
        $errors[] = "Сообщение должно содержать не менее 10 символов";
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $message = htmlspecialchars($message);
        
        print('<h1>Заявка отправлена</h1>');
        print("Имя: {$name}<br>");
        print("Электронная почта: {$email}<br>");
        print("Сообщение: {$message}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}