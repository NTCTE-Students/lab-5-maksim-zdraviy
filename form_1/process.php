<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $passw = trim($_POST['passw']);
    $passw_sub = trim($_POST['passw_sub']);
    
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

    if (empty($passw_sub)) {
        $errors[] = "Подтвердите пароль";
    } elseif (!preg_match("/^[a-zA-Z0-9._-]*$/", $name)) {
        $errors[] = "Неверный формат пароля";
    }
    
    
    if (empty($errors) and $passw==$passw_sub) {
        $name = htmlspecialchars($name);
        $passw = htmlspecialchars($passw);
        $passw_sub = htmlspecialchars($passw_sub);
        
        print('<h1>Вы зарегстрированы:</h1>');
        print("Имя: {$name}<br>");
        print("Пароль: {$passw}<br>");
    } else {
        if ($passw!=$passw_sub) {
            print("<p style='color: red;'>Пароли не совпадают</p>");
        }
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}