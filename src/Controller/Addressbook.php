<?php 

declare(strict_types=1);

namespace Stefan\CpTn\Controller;
use Stefan\CpTn\Database;

class Addressbook 
{
    public function __construct(private Database $database)
    {
    }
        
    public function create(): int 
    {
        $sql = "INSERT INTO addressbook SET surname=?, name=?, phone_number=?";
        $pdo = $this->database->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST["surname"],$_POST["name"],$_POST["phone_number"]]);
        return (int)$pdo->lastInsertId();

    }

}