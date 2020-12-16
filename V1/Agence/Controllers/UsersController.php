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

class UsersController extends BaseController
{


    /**
     * Affiche la liste des utilisateurs
     * @Route("/users", name="Homepage")
     */
    public function index()
    {
        return $this->view('users/index');
    }
    
}