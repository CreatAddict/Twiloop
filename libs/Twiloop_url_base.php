<?php

/**
 * Retourne l'url de base quelque soit l'emplacement du script
 * @return url_base
 */
function Twiloop_url_base() {
    $url_base = '';
    $url_base = strrpos($_SERVER['PHP_SELF'], '/', -4)+1;
    $url_base = substr($_SERVER['PHP_SELF'], 0, $url_base);
    $url_base = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$url_base;
    return $url_base;
}
