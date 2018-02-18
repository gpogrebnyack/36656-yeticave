<?php

require_once 'functions.php';
require_once 'lots-data.php';
require_once 'cats-data.php';
require_once 'login-data.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    // Проверка на обязательные поля
    $required = ['name', 'category', 'message', 'price', 'lot-step', 'lot-date'];
    $errors = [];
    foreach ($required as $key) {
        if (empty($_POST[$key])) {
            $errors[$key] = true;
        }
    }

    // Проверка изображения
    if (!isset($_FILES['img'])) {
        $errors['img'] = true;
    }
    if ($_FILES['img']['error'] == 4) {
        $errors['img'] = true;
    }

    if (isset($_FILES['img']['name'])) {
		$img_url = $_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'], 'img/' . $img_url);

    if (isset($img_url)) {
        $lot['img'] = $img_url;
    }
    } else {
		$errors['img'] = true;
    }  

    // Проверка на ожидаемый формат
    if (!filter_var($lot['price'], FILTER_VALIDATE_FLOAT)) {
        $errors[$key] = true;
    }
    if (!filter_var($lot['lot-step'], FILTER_VALIDATE_FLOAT)) {
        $errors[$key] = true;
    }

    // Вывод ошибок
    if (count($errors)) {
        $page_content = render('templates/add-lot.php', [
            'errors' => $errors,
            'lot' => $lot,
            'cat' => $cat,
        ]);
    }
    else {
        $page_content = render('templates/lot.php', ['lot' => $lot]);
    }
    
} 
else {
    $page_content = render('templates/add-lot.php', [
        'cat' => $cat,
    ]);
}

$layout_content = render('templates/layout.php', [
    'title' => 'Добавление лота',
    'is_auth' => $is_auth,
    'user_name' => $user_name, 
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'cat' => $cat
]);

print($layout_content);