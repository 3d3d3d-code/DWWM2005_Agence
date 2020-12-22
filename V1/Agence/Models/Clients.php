<?php
/**
 * Clients.php
 *
 * desc exemple
 *
 * @author Jjeanniard
 * @version 0.0.1
 */
namespace Agence\Models;

use \PDO;
use \PDOException;

class Clients
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Db::getPdo();
    }

    /**
     * Returns all clients of the database
     * @return array
     */
    public function getByAll() : array
    {
        $stmt = false;
        $users = [];

        $sql = 'SELECT * FROM clients';

        if($this->pdo->query($sql)){
            $stmt = $this->pdo->query($sql);
        }

        $users = $stmt->fetchAll(PDO::FETCH_CLASS, Client::class);

        return $users;
    }

    /**
     * Return one client choix of database
     * @param string $colonne name of the column
     * @param $value value of the search
     * @return array|null
     */
    public function getBy(string $colonne, $value) : ?array
    {
        $stmt = false;
        $user = null;

        $sql = 'select * from clients where '.$colonne.' = ? limit 1';

        if($this->pdo->prepare($sql)){
            $stmt = $this->pdo->prepare($sql);
        }

        try {
            if($stmt->execute([$value])){
                $user = $stmt->fetchAll(PDO::FETCH_CLASS, Client::class);
            }
        }catch (PDOException $e){
            echo "Error: une erreur a été levé lors de l'execution de la requete getBy client :\n  $e";
        }

        return $user;
    }
}