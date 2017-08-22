<?php

/**
 * ajoute une emprunte pour le cache bustin
 * @param type $path
 * @return $path
 */

function Twiloop_secure_page($id,$target) {
    if(!isset($id) && empty($id)) {
        $_SESSION['flash']['danger'] = $Twiloop_lang['Twiloop_secure_page_error'];
        header('Location: '.$target);
        exit;
    }
}
?>
