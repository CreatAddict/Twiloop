<?php

/**
 * Fonction qui renvoi un tableau avec un tableau des url et l'id s il existe dans la chaine de la derrnière chaine du tableau
 * @param type $url
 */

function Twiloop_router($url)
{
    $id_url = '';
    $urls = explode('/', $url);
    if ($urls[0] == '') {
        $urls = array_splice($urls, 1);
    }

    $url_end = end($urls);

    $urls_count = count($urls);

    if ($urls_count != 0) {
        if (strpos($url_end, '-')) {
            $serch_id_url = explode('-', $url_end);
            $serch_id_url_count = count($serch_id_url);
            foreach ($serch_id_url as $key => $value) {
                if (is_numeric($value)) {
                    $id_url = $serch_id_url[$key];
                }
            }
        }
    }
    return [$urls, $id_url];
}
