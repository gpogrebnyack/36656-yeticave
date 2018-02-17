<?php

require_once ('functions.php');
require_once ('lots-data.php');
require_once ('cats-data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    // Обязательные поля
    $required = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
    $errors = [];
    foreach ($required as $key) {
        if (empty($_POST[$key])) {
            $errors[$key] = '';
        }
    }

    if ($lot['category'] == "Выберите категорию") {
        $errors['category'] = '';
    }
    
    // Изображение
    if (isset($_FILES['lot-img']['name'])) {
        $tmp_name = $_FILES['lot-img']['tmp_name'];
        $path = $_FILES['lot-img']['name'];
        if (isset($path)) {
            move_uploaded_file($tmp_name, 'img/' . $path);
            $lot['path'] = 'img/' . $path;
        }     
    }
    else {
		$errors['lot-img'] = '';
	}

    // Проверка на ожидаемый формат
    foreach ($lot as $key => $value) {
        if ($key == 'lot-rate') {
            if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
                $errors[$key] = '';
            }
        }          
        elseif ($key == "lot-step") {
            if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
                $errors[$key] = '';
            }
        }
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
        $page_content = render('templates/new-lot.php', ['lot' => $lot]);
    }
    
} 
else {
    $page_content = render('templates/add-lot.php', [
    'cat' => $cat,
    ]);
}

$layout_content = render('templates/layout.php', [
    'title' => 'Главная',
    'is_auth' => $is_auth,
    'user_name' => $user_name, 
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'cat' => $cat
    ]);

print($layout_content);