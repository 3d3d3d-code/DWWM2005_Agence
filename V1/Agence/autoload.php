<?php

/**
 * AUTOLOAD.PHP
 * 
 * Ce fichier contient la/les fonction(s) d'autochargement de classes (autoloading)
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 * @todo Gérer l'erreur de chargement d'une classe via une exception
 */


/**
 * Fonction d'autochargement de classes
 * @author MDevoldere
 * @version 1.0.0
 * @param string $_classname Le nom de la classe à charger 
 */
function agence_autoload(string $_classname)
{
    $_classname = str_replace('\\', '/', $_classname);

    $_classname = (dirname(__DIR__) . '/' . $_classname . '.php');

    if (is_file($_classname)) {
        require $_classname;
    } else {
        exit('Error: Invalid Component');
    }
}

// enregistrement de la fonction "agence_autoload" dans la pile d'autochargement de PHP
spl_autoload_register('agence_autoload');
