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
        $sql_add = $DB->prepare("DELETE FROM {$table} SET {$reqSet}{$condition}");
        $sql_add->execute($reqValues);
        return TRUE;
    } catch (PDOException $e) {
        echo $e;
        return FALSE;
    }
}
