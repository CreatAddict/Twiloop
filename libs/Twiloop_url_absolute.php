<?php

function Twiloop_url_absolute() {
    $url_absolu = explode('/', $_SERVER["REQUEST_URI"]);

    $url_count = count($url_absolu) - 1;
    $data_url = array();
    for ($i = 0; $i != $url_count; $i++) {
        if ($url_absolu[$i] != $langue)
            $data_url[] = $url_absolu[$i];
    }
    $url_absolu = implode('/', $data_url);

    return $url_absolu;
}
