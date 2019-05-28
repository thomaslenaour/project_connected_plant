<?php

/**
 * Permet de sécuriser une châine de caractères
 * @param $string
 * @return string
 */
function str_secur($string) {
    return trim(htmlspecialchars($string));
}

/**
 * Débug plus lisible
 * @param $var
 */
function debug($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function isConnected() {
    if (isset($_SESSION['isUserConnected']) && isset($_SESSION['userEmail']) && isset($_SESSION['userID'])) {
        if (!empty($_SESSION['isUserConnected']) && !empty($_SESSION['userEmail']) && !empty($_SESSION['userID'])) {
            return true;
        }
    }
    else {
        return false;
    }
}