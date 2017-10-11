<?php

/**
* Select DB
* @param type $DB
* @param type $champ
* @param type $extend_sql
* @param type $fetchall
* @param type $disting
* @return object
*/

function Twiloop_sql_select($DB, $table, $champ, $extend_sql = '', $data = [], $fetchall = false, $disting = false)
{
    $req = '';

    if ($disting === true) {
        $champ = "DISTINCT {$champ}";
    }

    try {
        $req = $DB->prepare("SELECT {$champ} FROM {$table} {$extend_sql}");
        $status = $req->execute($data);
        if ($status === false) {
            return false;
        } else {
            if ($fetchall === true) {
                return $req->fetchAll();
            } else {
                return $req->fetch();
            }
        }
    } catch (PDOException $e) {
        return false;
    }
}
