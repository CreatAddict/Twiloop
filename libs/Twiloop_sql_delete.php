<?php

/**
 * Delete DB
 * @param type $DB
 * @param type $table
 * @param type $condition
 * @return boolean
 */
function Twiloop_sql_delete($DB, $table, $condition) {
    $req = '';

    if(!empty($condition)) {
        $condition = " WHERE {$condition}";
    }

    try {
        $req = $DB->prepare("DELETE FROM {$table}{$condition}");
        $status = $req->execute();
        if($status === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    } catch (PDOException $e) {
        echo $e;
        return FALSE;
    }
}

?>