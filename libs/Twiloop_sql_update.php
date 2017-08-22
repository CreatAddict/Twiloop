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
    $req_set = [];
    $reqValues = [];

    if(!empty($condition)) {
        $condition = " WHERE {$condition}";
    }

    foreach ($data as $k => $v) {
        $reqParam = ":{$key}";
        $req_set[] = "{$k} = {$reqParam}";
        $reqValues[$reqParam] = $DB->quote($v);
    }

    $req_set = implode(', ', $req_set);

    try {
        $sql_add = $DB->prepare("DELETE FROM {$table} SET {$req_set}{$condition}");
        $sql_add->execute($reqValues);
        return TRUE;
    } catch (PDOException $e) {
        echo $e;
        return FALSE;
    }
}
