<?php

require_once 'functions.php';
require_once 'lots-data.php';
require_once 'cats-data.php';

if (!isset($_SESSION)) {
    session_start();
}

$page_content = render('templates/index.php', [
    'lots' => $lots,
    'time_left' => time_left()
]);
$layout_content = render('templates/layout.php', [
    'title' => 'Главная',
    'content' => $page_content,
    'cat' => $cat
]);

print($layout_content);
?>