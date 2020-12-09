<?php

/**
 * INDEX.PHP
 * 
 * Routage de l'application MVC
 * 
 * @author MDevoldere
 * @version 0.0.1
 * 
 * @todo Sécuriser les données entrantes
 * @todo Instancier L'application
 */

// inclusion de l'autoloader
require_once dirname(__DIR__) . '/Agence/autoload.php';

use Agence\Validation;


/**
 * Lecture du chemin demandé 
 */
$path = trim($_SERVER['REQUEST_URI'], '/');


$route = explode('/', $path);


/**
 * Les éléments de notre route sont dans le tableau $route.
 * 1er élément  : Nom du contrôleur à invoquer
 * 2ème élément : Nom de la méthode à exécuter dans la contrôleur invoqué
 * 3ème élément : Paramètre à envoyer dans la méthode exécutée (typiquement, un identifiant)
 */


// récupération du 1er élement du tableau. S'il est vide ou inexistant, on attribue une valeur par défaut
$controller = !empty($route[0]) ? $route[0] : 'home';

// récupération du 2nd élement du tableau. S'il est vide ou inexistant, on attribue une valeur par défaut
$action = !empty($route[1]) ? $route[1] : 'DefaultActionName';

// récupération du 3ème élement du tableau. S'il est vide ou inexistant, on attribue la valeur null
$param = !empty($route[2]) ? $route[2] : null;


/**
 * Validation des données
 */
if (Validation::isAlphabetic($controller) && Validation::isAlphabetic($action)) {
    // controller & action OK
} else {
    // controller ou action NO OK
    // on déclenchera ici une erreur 
}
