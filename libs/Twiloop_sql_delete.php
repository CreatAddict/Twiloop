<?php

/**
 * Delete DB
 * @param type $DB
 * @param type $table
 * @param type $condition
 * @return boolean
 */
 
function Twiloop_sql_delete($DB, $table, $condition)
{
    $req = '';

    if (!empty($condition)) {
        $condition = " WHERE {$condition}";
    }

    try {
        $req = $DB->prepare("DELETE FROM {$table}{$condition}");
        $status = $req->execute();
        if ($status === false) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        echo $e;
        return false;
    }
}
