<?php 

/**
 * HOMECONTROLLER.PHP
 * 
 * Contrôleur pour la page d'accueil du site
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 */

namespace Agence\Controllers;

use Agence\BaseController;
use Agence\Session;

class HomeController extends BaseController
{    

    public array $users;
    
    public function __construct($id = null) 
    {
        //parent::__construct($id);

        $this->users = [
            'admin' => \password_hash('azerty', PASSWORD_BCRYPT)
        ];

        $this->id = \intval($id ?? 0);
    }
    
    /**
     * Page d'accueil du site
     * @Route("/")
     */
    public function index()
    {
        if(Session::isLogged()) {
            // redirection vers /users
            header('Location: /users');
            exit;
        }
        else {
            // redirection vers /home/login
            header('Location: /home/login');
            exit;
        }
    }

    /**
     * Formulaire d'identification
     * @Route("/home/login")
     */
    public function login()
    {

        return $this->view('home/login');
    }
}