<?php

/**
 * Insert DB
 * @param type $DB
 * @param type $table
 * @param type $data
 * @return boolean
 */
function Twiloop_sql_insert($DB, $table, $data) {
    $reqKeys = [];
    $reqParams = [];
    $reqValues = [];

    foreach ($data as $k => $v) {
        $reqKeys[] = $k;
        $reqParam = ":{$k}";

        $reqParams[] = $reqParam;
        $reqValues[$reqParam] = $v;
    }

    $keys = implode(', ', $reqKeys);
    $params = implode(', ', $reqParams);

    try {
        $req = $DB->prepare("INSERT INTO {$table} ({$keys}) VALUES ({$params})");
        $req->execute($reqValues);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
