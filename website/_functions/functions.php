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