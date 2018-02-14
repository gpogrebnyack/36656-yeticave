<?php

require_once ('functions.php');
require_once ('lots-data.php');
require_once ('lots-login.php');
require_once ('lots-cat.php');

$page_content = render('templates/index.php', [
    'lots' => $lots,
    'time_left' => time_left()
    ]);
$layout_content = render('templates/layout.php', [
    'title' => 'Главная',
    'is_auth' => $is_auth, 
    'user_name' => $user_name, 
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'cat' => $cat
    ]);

print($layout_content);
?>