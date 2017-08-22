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

    foreach ($data as $key => $val) {
        $reqKeys[] = $key;
        $reqParam = ":{$key}";

        $reqParams[] = $reqParam;
        $reqValues[$reqParam] = $DB->quote($val);
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
