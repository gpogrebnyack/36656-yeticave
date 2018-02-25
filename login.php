<?php

require_once 'functions.php';
require_once 'lots-data.php';
require_once 'cats-data.php';
require_once 'userdata.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;

    // Проверка на обязательные поля
    $required = ['email', 'password'];
    $errors = [];
    foreach ($required as $key) {
        if (empty($form[$key])) {
            $errors[$key] = 'Заполните поле';
        }
    }

    if (!empty($form['email'])) {
        // Проверка на ожидаемый формат
        if (!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Введите корректный email';
        } else {
            // Аутентификация
            if (!count($errors) and $user = searchUserByEmail($users, $form['email'])) {
                if (password_verify($form['password'], $user['password'])) {
                    $_SESSION['user'] = $user;
                }
                else {
                    $errors['password'] = 'Вы ввели неверный пароль';
                }
            } else {
                $errors['email'] = 'Такой пользователь не найден';
            }
        }
    }
    
    // Вывод ошибок
    if (count($errors)) {
        $page_content = render('templates/login.php', [
            'errors' => $errors,
            'form' => $form,
        ]);
    } else {
		header("Location: index.php");
		exit();
	}

    
} else {
    $page_content = render('templates/login.php', [
        'cat' => $cat,
    ]);
}

$layout_content = render('templates/layout.php', [
    'title' => 'Вход на сайт',
    'content' => $page_content,
    'cat' => $cat
]);

print($layout_content);
?>