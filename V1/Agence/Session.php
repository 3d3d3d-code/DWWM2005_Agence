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


    /**
     * Définit une donnée dans la session utilisateur courante
     * @param string $_key la clé dans le tableau $_SESSION
     * @param string $_value la valeur à associer à la clé
     */
    static public function set(string $_key, string $_value)
    {
        $_SESSION[$_key] = $_value;
    }

    /**
     * Lit une donnée dans la session utilisateur courante
     * @param string $_key la clé dans le tableau $_SESSION
     * @param bool $_value la valeur à associer à la clé
     */
    static public function get(string $_key, bool $_delete = false)
    {
        $value = $_SESSION[$_key] ?? null;

        if($_delete === true) {
            $_SESSION[$_key] = null;
        }

        return $value;
    }
}