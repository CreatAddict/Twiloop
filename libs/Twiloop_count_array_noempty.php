<?php

/**
 * Counte les enrtré non vide d'un simple array
 * @param type $data
 * @return int
 */
function Twiloop_count_array_noempty($data) {
    $i = 0;
    foreach ($data as $k) {
        if ($k != '') {
            $i++;
        }
    }
    return $i;
}
