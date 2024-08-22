<?php 

declare(strict_types=1);

define("ROOT_PATH", dirname(__DIR__));

require ROOT_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use DI\Container;
use Stefan\CpTn\App;
use Stefan\CpTn\Controller\Addressbook;

$container = new Container();

if(isset($_POST["numbers"])){
    
    $app = $container->get(App::class);
    $result = $app->performDatabaseSearch($_POST["numbers"]);
    sort($result);

}

if(isset($_POST["newentry"])){

    $addressbook = $container->get(Addressbook::class);
    $entryid = $addressbook->create();
    $success = "<div style=\"color:green;\"><b>SUCCESS:</b> Entry {$entryid} created!</div>";

}

require_once ROOT_PATH . '/views/home.php';

