<?php
/**
 * ROUTER.PHP
 * 
 * Permet de simuler les réécritures d'url
 * À utiliser avec le serveur de développment intégré à PHP
 * Dans un terminal : 
 * 1° Se positionner dans le répertoire où se siture l'application web
 * 2° tapez la commande :   "php -S localhost:80 router.php"
 * 3° ouvrez un navigateur et naviguez vers http://localhost
 * 
 * @author MDevoldere
 * @version 1.0.0
 */

if(!file_exists(__DIR__ .$_SERVER['REQUEST_URI'])) {
    require (__DIR__.'/index.php');
}
else {
    return false;
}
