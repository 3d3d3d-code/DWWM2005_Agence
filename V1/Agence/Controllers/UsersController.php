<?php 

/**
 * USERSCONTROLLER.PHP
 * 
 * Contrôleur pour la gestion des utilisateurs
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 */

namespace Agence\Controllers;

use Agence\BaseController;
use Agence\Session;

class UsersController extends BaseController
{


    /**
     * Affiche la liste des utilisateurs
     * @Route("/users", name="Homepage")
     */
    public function index()
    {
        var_export($_SESSION);
        return $this->view('users/index');
    }
    
}