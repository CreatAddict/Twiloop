<?php

/**
* Select DB
* @param type $DB
* @param type $champ
* @param type $condition
* @param type $fetchall
* @param type $disting
* @return object
*/
function Twiloop_sql_select($DB, $table, $champ, $condition = '', $data = '', $fetchall = false, $disting = false) {
    $req = '';

    if(!empty($condition)) {
        $condition = " WHERE {$condition}";
    }

    if($disting === true) {
        $champ = "DISTING {$champ}";
    }

    try {
        $req = $DB->prepare("SELECT {$champ} FROM {$table} {$condition}");
        $req->execute($reqValues);
        if($fetchall === true) {
            return $req->fetchAll($data);
        } else {
            return $req->fetch($data);
        }
    } catch (PDOException $e) {
        echo $e;
        return FALSE;
    }
}
