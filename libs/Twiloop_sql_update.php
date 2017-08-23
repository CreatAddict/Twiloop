<?php

/**
 * Update DB
 * @param type $DB
 * @param type $table
 * @param type $data
 * @param type $condition
 * @return boolean
 */
function Twiloop_sql_update($DB, $table, $data, $condition = '') {
    $req = '';
    $reqSet = [];
    $reqValues = [];

    if(!empty($condition)) {
        $condition = " WHERE {$condition}";
    }

    foreach ($data as $k => $v) {
        $reqParam = ":{$k}";
        $reqSet[] = "{$k} = {$reqParam}";
        $reqValues[$reqParam] = $v;
    }

    $reqSet = implode(', ', $reqSet);
    try {
        $req = $DB->prepare("UPDATE {$table} SET {$reqSet}{$condition}");
        $req->execute($reqValues);
        return $req->rowCount();
    } catch (PDOException $e) {
        echo $e;
        return FALSE;
    }
}

?>