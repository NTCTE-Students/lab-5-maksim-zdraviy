<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательнa';
    } if (empty($date)) {
        $errors[] = "Дата обязательна";
    } if (empty($date)) {
        $errors[] = "Время обязательно";
    } 

    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $date = htmlspecialchars($date);
        $time = htmlspecialchars($time);
        
        print('<h1>Вы забронированы:</h1>');
        print("Имя: {$name}<br>");
        print("Дата: {$date}<br>");
        print("Время: {$time}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}