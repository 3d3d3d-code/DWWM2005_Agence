<?php 

/**
 * DB.PHP
 * 
 * Réprésente une connexion vers une base de données
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 */

namespace Agence\Models;

use \PDO;
use \PDOException;

class Db 
{
    /** @var PDO $pdo La connexion à la base de données */
    static private ?PDO $pdo = null;

    /**
     * Crée et retourne la connexion PDO à la base de données Agence de Voyages
     * Retourne directement la connexion si celle ci est déjà ouverte.
     * @return PDO La connexion PDO
     */
    static public function getPdo()
    {
        // Si la connexion n'est pas encore ouverte
        if(Db::$pdo === null) 
        {
            try { // tentative de connexion
                
                // chaine de connexion
                $dsn = 'mysql:host=localhost;port=3306;dbname=tp_agence_voyages;charset=utf8';

                // options de connexion
                $options = [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];

                // connexion
                Db::$pdo = new PDO($dsn, 'root', '', $options);

            } catch(PDOException $e){

            }
        }

        return Db::$pdo;
    }
}