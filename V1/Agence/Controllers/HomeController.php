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
use Agence\Models\Sales;
use Agence\Session;
use Agence\Validation;

class HomeController extends BaseController
{    

    
    public function __construct($id = null) 
    {
        //parent::__construct($id);

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
            header('Location: /sales');
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
        //echo '<pre>'.var_export($_POST, true).'</pre>';

        // Si le formulaire a été soumis
        if($_POST) {
            // récupération des champs nécessaires ou null si non renseignés
            $username = $_POST['username'] ?? null;
            $pass = $_POST['pass'] ?? null;

            // Si le nom d'utilisateur et le mot de passe correspondent aux formats requis
            if( Validation::isAlphanumeric($username, 2)
                && 
                Validation::isValidPassword($pass)
            ) 
            {
                // on instancie la classe d'accès à la table des commercieux
                $sales = new Sales(); 
                
                // Récupération de l'utilisateur demandé
                $user = $sales->getByUsername($username);
                    
                // si l'utilisateur existe
                if($user !== false) {
                    // si les mots de passe correspondent
                    if(password_verify($pass, $user['com_password'])) {
                        unset($user['com_password']);
                        Session::login($user); // ajout de l'utilisateur dans la session
                        header('location: /sales'); // redirection
                        exit; 
                    }
               }
            }

            // identification échouée
            Session::set('msg', 'identifiants incorrects');
            header('location: /home/login');
            exit;
        }

        // si aucun formulaire soumis ($_POST vide), on affiche simplement le formulaire
        return $this->view('home/login');
    }

    /**
     * Déconnexion de l'utilisateur
     * @Route('/home/logout')
     */
    public function logout()
    {
        Session::logout();
        header('location: /');
        exit;
    }
}