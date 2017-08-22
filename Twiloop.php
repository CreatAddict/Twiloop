<?php
/*
 * Twiloop catalogue de fonctions "CreatAddict"
 * Version : 1.0
 * Date 27/06/2012
 */

/**
 * Définir le séparateur de répertoir
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * Défini la constante TWILOOP_DIR à un chemin absolu vers les fichiers bibliothèques de TWILOOP.
 * Règle TWILOOP_DIR que si cette application utilisateur n'a pas encore défini.
 */
if (!defined('TWILOOP_DIR')) {
    define('TWILOOP_DIR', dirname(__FILE__) . DS);
}

/**
 * Défini la constante TWILOOP_SYSPLUGINS_DIR à un chemin absolu vers les fichiers bibliothèques de TWILOOP interne au fonction à chargé.
 * Règle TWILOOP_SYSPLUGINS_DIR que si cette application utilisateur n'a pas encore défini.
 */
if (!defined('TWILOOP_LIBS_DIR')) {
    define('TWILOOP_LIBS_DIR', TWILOOP_DIR . 'libs' . DS);
}

/**
 * Défini la constante TWILOOP_LANG_DIR à un chemin absolu vers les fichiers bibliothèques de TWILOOP interne au lang à chargé pour les fonctions.
 * Règle TWILOOP_LANG_DIR que si cette application utilisateur n'a pas encore défini.
 */
if (!defined('TWILOOP_LANG_DIR')) {
    define('TWILOOP_LANG_DIR', TWILOOP_DIR . 'lang' . DS);
}

/**
 * Inclu le bon fichier de langue si la variable est définie
 */
if(isset($langue) && $langue != '') {
    include TWILOOP_LANG_DIR . (($langue != '') ? $langue : 'fr') . '.php';
}

/**
 * Chargement des fonctions
 */
$dossier = opendir(TWILOOP_LIBS_DIR);

if ($dossier) {
    while (false !== ($fichier = readdir($dossier))) {
            if (strpos($fichier, 'Twiloop_') !== FALSE && strpos($fichier, '.php') !== FALSE) {
                include TWILOOP_LIBS_DIR.$fichier;
            }
    }
}
