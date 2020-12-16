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

use Agence\FrontController;
use Agence\Validation;


/**
 * Lecture du chemin demandé (et supprression des "/" en début et fin de chaine)
 */
$path = trim($_SERVER['REQUEST_URI'], '/');



/**
 * On scinde le chemin (le chemin est séparé par les slashes "/")
 * ex: home/users/42 = ['home', 'users', '42']
 */
$route = explode('/', $path);


/**
 * Les éléments de notre route sont dans le tableau $route.
 * 1er élément  $route[0] : Nom du contrôleur à invoquer
 * 2ème élément $route[1] : Nom de la méthode à exécuter dans le contrôleur invoqué
 * 3ème élément $route[2] : Paramètre à envoyer dans la méthode exécutée (typiquement, un identifiant)
 */


// récupération du 1er élement du tableau. S'il est vide ou inexistant, on attribue une valeur par défaut
$controller = !empty($route[0]) ? $route[0] : 'home';
//echo $controller;
// récupération du 2nd élement du tableau. S'il est vide ou inexistant, on attribue une valeur par défaut
$action = !empty($route[1]) ? $route[1] : 'index';

// récupération du 3ème élement du tableau. S'il est vide ou inexistant, on attribue la valeur null
$id = !empty($route[2]) ? $route[2] : null;




/**
 * Validation des données
 */
if (Validation::isAlphabetic($controller) && Validation::isAlphabetic($action)) {
    // controller & action OK

    /**
     * CONTROLLER ($route[0])
     */
    // $controller = ucfirst($controller); // 1ere lettre en majuscule
    $controller = mb_convert_case($controller, MB_CASE_TITLE); // conversion de la casse de la chaine (tout en minuscule sauf la 1ere lettre)
    $controller = basename($controller); // suppression de toute notion de chemin

    // on définit le nom de la classe Controller à instancier
    $controller = '\\Agence\\Controllers\\' . $controller . 'Controller';


    /**
     * ACTION ($route[1])
     */
    $action = mb_convert_case($action, MB_CASE_LOWER); // conversion de la casse de la chaine (tout en minuscule)
    $action = basename($action);

    // on instancie le contrôleur frontal
    $frontcontroller = new FrontController($controller, $action, $id);

    // exécution du contrôleur frontal
    $result = $frontcontroller->index();
    echo $result;
    exit;
} // fin if validation