<?php
date_default_timezone_set("Europe/Moscow");

    function render($path, $data = array()) {
        if (file_exists($path)) {
            ob_start();
            extract($data);
            require_once($path);
            return ob_get_clean();
        } 
        return '';
    }

    function clear_price($price) {
        $price = ceil($price);
        if ($price >= 1000) {
            $price = number_format($price, 0, '', ' ');
        }
        return $price . " ₽";
    }

    function time_left() { 
        $exptime = strtotime('tomorrow') - time();
        $hours = floor($exptime / 3600);
        $minutes = floor(($exptime % 3600) / 60);
        return $hours . ":" . str_pad($minutes, 2, "0", STR_PAD_LEFT);
    }

    function lot_time_left($lotDate) {  
        $lotDate = $lotDate . date("23:59");
        $exptime = strtotime($lotDate) - time();
        $hours = floor($exptime / 3600);
        $minutes = floor(($exptime % 3600) / 60);
        $secs = $exptime - $hours * 3600 -  $minutes * 60;
        return str_pad($hours, 2, "0", STR_PAD_LEFT) . ":" . str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($secs, 2, "0", STR_PAD_LEFT);
    }

    function searchUserByEmail($email, $users) {
	$result = null;
	foreach ($users as $user) {
		if ($user['email'] == $email) {
			$result = $user;
			break;
		}
	}
	return $result;
}

?>