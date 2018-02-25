<?php
require_once 'functions.php';
require_once 'lots-data.php';
require_once 'cats-data.php';

$lot = null;

if (isset($_GET['id'])) {
    $lot_id = $_GET['id'];

    //Запись посещённых лотов в куки
    $visitedLots = isset($_COOKIE['visitedLots']) ? json_decode($_COOKIE['visitedLots']) : [];
    if (!in_array($lot_id, $visitedLots)) {
        $visitedLots[] = $lot_id;
    }
    setcookie('visitedLots', json_encode($visitedLots), strtotime("+30 days"), '/');

    
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
    'content' => $page_content,
    'cat' => $cat
]);

print($layout_content);

?>