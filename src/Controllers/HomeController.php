<?php 

declare(strict_types=1);

namespace Stefan\CpTn\Controllers;

use PDO;
use Stefan\CpTn\Database;
use Stefan\CpTn\TNine;

class HomeController
{
    public function __construct(private TNine $tnine, private Database $database)
    {
    }
        
    /**
     * performDatabaseSearch
     *
     * @param  mixed $numbers
     * @return array
     */
    public function performDatabaseSearch(string $numbers = "") : array 
    {

        $pattern = '^' . $this->tnine->getPattern($numbers);
        
        if($pattern != '^'){

            $sql = "SELECT * FROM `addressbook` WHERE REGEXP_INSTR(surname, ?) OR REGEXP_INSTR(name, ?);";
            $pdo = $this->database->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$pattern, $pattern]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        }

        return [];

    }

}