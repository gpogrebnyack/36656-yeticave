<?php

require_once 'functions.php';
require_once 'lots-data.php';
require_once 'login-data.php';
require_once 'cats-data.php';

if (isset($_COOKIE['visitedLots'])) {
    $visitedLots = json_decode($_COOKIE['visitedLots']);
    foreach ($visitedLots as $id){
        $lotsVisited[] = $lots[$id];
    }

    $page_content = render('templates/history.php', [
        'lots' => $lotsVisited
    ]);
        
    $layout_content = render('templates/layout.php', [
        'title' => 'История просмотров',
        'is_auth' => $is_auth, 
        'user_name' => $user_name, 
        'user_avatar' => $user_avatar,
        'content' => $page_content,
        'cat' => $cat
    ]);

    print($layout_content);

} else {
    http_response_code(404);
}
