<?php
require_once 'functions.php';
require_once 'lots-data.php';
require_once 'login-data.php';
require_once 'cats-data.php';

$lot = null;

if (isset($_GET['id'])) {
    $lot_id = $_GET['id'];

    //Запись посещённых лотов в куки
    $visitedLot = array();
    $visitedLot[] = $lot_id;
    if (isset($_COOKIE['visitedLot'])) {
        $visitedLot = json_decode($_COOKIE['visitedLot']);
        if (in_array($lot_id, $visitedLot)) {
            $visitedLot = $visitedLot;
        } else {
            $visitedLot[] = $lot_id;
        }
    }
    setcookie('visitedLot', json_encode($visitedLot), strtotime("+30 days"), '/');

    
    foreach ($lots as $key => $value) {
        if ($key == $lot_id) {
            $lot = $value;
            break;
        }
    }
    
}

if (!$lot) {
	http_response_code(404);
}

$page_content = render('templates/lot.php', [
    'lot' => $lot,
    ]);

$layout_content = render('templates/layout.php', [
    'title' => $lot['name'],
    'is_auth' => $is_auth,
    'user_name' => $user_name, 
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'cat' => $cat
    ]);

print($layout_content);

?>