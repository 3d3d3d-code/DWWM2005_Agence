<?php 

namespace Agence\Models;

use \PDO;
use \PDOException;

class Db 
{
    static private ?PDO $pdo = null;

    static public function getPdo()
    {
        if(Db::$pdo === null) 
        {
            try {
                // tentative de connexion

                $dsn = 'mysql:host=localhost;port=3306;dbname=tp_agence_voyages;charset=utf8';

                Db::$pdo = new PDO($dsn, 'root', '', []);

            } catch(PDOException $e){

            }
        }

        return Db::$pdo;
    }

}