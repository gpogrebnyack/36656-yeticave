<?php

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
        date_default_timezone_set("Europe/Moscow");
        $time_midnight = strtotime('tomorrow');
        $exptime = $time_midnight - time();
        $hours = floor($exptime / 3600);
        $minutes = floor(($exptime % 3600) / 60);
        return $hours . ":" . str_pad($minutes, 2, "0", STR_PAD_LEFT);
    }
    
?>