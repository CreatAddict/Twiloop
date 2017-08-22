<?php

/**
 * Initialise la connection a la DB
 * @param type $db_host
 * @param type $db_name
 * @param type $db_user
 * @param type $db_pass
 * @return boolean|PDO
 */
function Twiloop_sql_init_db() {
    global $db_host, $db_name, $db_user, $db_pass;
    if($db_name != '') {
        $db_name = ';dbname=' . $db_name;
    }
    try {
        $DB = new PDO('mysql:host=' . $db_host . $db_name, $db_user, $db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $DB;
    } catch (PDOException $e) {
        return FALSE;
    }
}
