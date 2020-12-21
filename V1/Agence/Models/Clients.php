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

class Clients
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Db::getPdo();
    }

    public function getByAll() : array
    {
        $stmt = false;

        $sql = 'SELECT * FROM clients';

        if($this->pdo->query($sql)){
            $stmt = $this->pdo->query($sql);
        }

        $users = $stmt->fetchAll(PDO::FETCH_CLASS, Client::class);

        $stmt->closeCursor();

        return $users;
    }

    public function getBy(string $colonne, array $values)
    {

    }
}