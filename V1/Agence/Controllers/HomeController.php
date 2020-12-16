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
use Agence\Validation;

class HomeController extends BaseController
{    

    public array $users;
    
    public function __construct($id = null) 
    {
        //parent::__construct($id);

        $this->users = [
            'admin' => \password_hash('Azerty78!', PASSWORD_BCRYPT)
        ];

        $this->id = \intval($id ?? 0);
    }
    
    /**
     * Vérifie s'utilisateur est connecté
     * Si identifié : redirection vers /users
     * sinon : redirection
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
        echo '<pre>'.var_export($_POST, true).'</pre>';

        if($_POST) {
            $username = $_POST['username'] ?? null;
            $pass = $_POST['pass'] ?? null;

            if( Validation::isAlphanumeric($username, 4)
                && 
                Validation::isValidPassword($pass)
            ) 
            {
                if(array_key_exists($username, $this->users)) {
                    if(password_verify($pass, $this->users[$username])) {
                        Session::login($username);
                        header('location: /users');
                        exit;
                    }
                }
            }
            header('location: /home/login');
            exit;
        }

        return $this->view('home/login');
    }
}