<?php 

/**
 * SALES.PHP
 * 
 * Classe d'interaction avec la table "sales"
 * 
 * @author MDevoldere
 * @version 1.0.0
 * 
 */

namespace Agence\Models;

use PDO;
use PDOException;

class Sales 
{

    /** @var PDO Connexion PDO à utiliser */
    private PDO $pdo;

    /**
     * Initialisation
     */
    public function __construct()
    {
        $this->pdo = Db::getPdo();
    }
    
    /**
     * Recherche un commercial par son code d'identification (com_code)
     * @param string $_username Le  com_code à rechercher
     * @return array|false un tableau contenant les informations du commercial ou false si le com_code n'existe pas.
     */
    public function getByUsername(string $_username)
    {
        try {
            $user = false;
        
            $sql = "SELECT * FROM sales WHERE com_code=:username;";

            $values = [
                ':username' => $_username
            ];

            $stmt = $this->pdo->prepare($sql);

            //$stmt->setFetchMode(PDO::FETCH_CLASS, Saleman::class);

            if($stmt->execute($values)) {
                $user = $stmt->fetch();
            }

            $stmt->closeCursor();

            return $user;

        } catch(PDOException $e) {

        }
    }

}