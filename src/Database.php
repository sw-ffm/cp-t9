<?php 

declare(strict_types=1);

namespace Stefan\CpTn;

use PDO;

class Database 
{

    private ?PDO $pdo=null;

    public function getConnection(): PDO
    {
        if($this->pdo === null){

            $dns = "mysql:host={$_ENV["DB_HOST"]};dbname={$_ENV["DB_DATABASE"]};charset=utf8;port=3306";

            $this->pdo = new PDO($dns, $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

        }

        return $this->pdo;

    }
}
