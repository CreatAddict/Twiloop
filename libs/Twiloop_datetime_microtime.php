<?php

/**
* Retourne une date et heure avec microseconde
* @param type $format
* @return string
*/

function Twiloop_datetime_microtime($format)
{
    $time = microtime(true);
    $micro_time=sprintf("%06d",($time - floor($time)) * 1000000);
    $date = new DateTime( date('Y-m-d H:i:s.'.$micro_time,$time) );
    return $date->format($format);
}
