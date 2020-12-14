<?php

/**
 * VALIDATION.PHP
 * 
 * Permet de valider des formats de données
 * 
 * @author MDevoldere
 * @version 0.0.1
 * 
 * @todo Validation de chaines : alphanumérique, email, téléphone, prix
 */

namespace Agence;

/**
 * Classe de validation de données
 * 
 * Validation permet de contrôler le format de chaines de caractères
 * Toutes les méthodes de validation sont statiques
 * 
 * @author MDevoldere
 * @version 0.0.1
 */
class Validation
{

    /**
     * Valide une chaine de caractère alphabétique
     * @param string $subject la chaine de caractères à tester
     * @return bool ture si la chaine correspond au format attendu, sinon false
     */
    static public function isAlphabetic(string $subject): bool
    {

        // si $subject correspond à la regex
        if (preg_match('/^[a-zA-Z]+$/', $subject)) {
            return true;
        } else {
            return false;
        }
    }
}
