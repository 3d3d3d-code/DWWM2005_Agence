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
use PDORow;

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
     * Retourne tous les commerciaux
     * @return array tous les commerciaux présents dans la table
     */
    public function getAll()
    {
        try {
            return $this->pdo->query("SELECT com_code, com_name, com_substitute FROM sales ORDER BY com_code ASC;")->fetchAll();
            
        } catch (PDOException $e) {

        }
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


    /**
     * Insère un nouveau commercial
     * @param Saleman $newItem le nouveau commercial à ajouter
     * @return int le nombre de lignes affectées par la requête INSERT (à priori 1^^)
     */
    public function insert(Saleman $newItem)
    {
        try {
            $nb = 0;
        
            $sql = "INSERT INTO sales 
            (com_code, com_name, com_password, com_substitute)
            VALUES 
            (:com_code, :com_name, :com_password, :com_substitute);";

            $values = $newItem->toArray();

            $stmt = $this->pdo->prepare($sql);

            if($stmt->execute($values)) {
                $nb = $stmt->rowCount(); // nombre de lignes affectées par la requête
            }

            $stmt->closeCursor();

            return $nb;
            
        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

}