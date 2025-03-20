<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $passw = trim($_POST['passw']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Z]*$/", $name)) {
        $errors[] = "В имени допускается использовать только символы латинского алфавита и пробел";
    }
    
    if (empty($passw)) {
        $errors[] = "Введите пароль";
    } elseif (!preg_match("/^[a-zA-Z0-9._-]*$/", $name)) {
        $errors[] = "Неверный формат пароля";
    }
    
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $passw = htmlspecialchars($passw);
        
        print('<h1>Вы успешно вошли:</h1>');
        print("Имя: {$name}<br>");
        print("Пароль: {$passw}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}