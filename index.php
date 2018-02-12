<?php
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$cat = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$lots = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => $cat[0],
        'price' => 10999,
        'img' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => $cat[0],
        'price' => 159999,
        'img' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => $cat[1],
        'price' => 8000,
        'img' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => $cat[2],
        'price' => 10999,
        'img' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => $cat[3],
        'price' => 7500,
        'img' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => $cat[5],
        'price' => 5400,
        'img' => 'img/lot-6.jpg'
    ]
];

require_once ('functions.php');

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