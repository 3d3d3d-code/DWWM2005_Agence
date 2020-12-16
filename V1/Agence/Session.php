<?php

/**
 * SESSION.PHP
 * 
 * Permet de gérer la SESSION PHP utilisateur
 * 
 * @author MDevoldere
 * @version 0.0.1
 * 
 * @todo 
 */

namespace Agence;

\session_start();

class Session 
{
    // classe statique = constructeur privé
    private function __construct() {}
    

    /**
     * L'utilisateur courant est-il identifié ?
     * @return bool true si identifié, sinon false
     */
    static public function isLogged() : bool 
    {
        return !empty($_SESSION['user']);
    }

    /**
     * Ajoute un utilisateur à la session courante
     * Ceci se produit lorsque l'utilisateur a confirmé son identité
     */
    static public function login($user)
    {
        $_SESSION['user'] = $user;
    }


    /**
     * Deconnexion de l'utilisateur courant et destruction de la session actuelle.
     */
    static public function logout()
    {
        \session_destroy();
    }
}