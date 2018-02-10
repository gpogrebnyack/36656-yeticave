<?php

    function render($path, $data = array()) {
        if (file_exists($path)) {
            ob_start();
            extract($data);
            require_once($path);
            return ob_get_clean();
        } else {
            return null;
        }
    }

    function clear_price($price) {
        $price = ceil($price);
        if ($price >= 1000) {
            $price = number_format($price, 0, '', ' ');
        }
        return htmlspecialchars($price . " ₽" );
    }

?>