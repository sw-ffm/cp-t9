<?php 

declare(strict_types=1);

define("ROOT_PATH", dirname(__DIR__));

require ROOT_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable( ROOT_PATH );
$dotenv->load();

use DI\ContainerBuilder;
use Stefan\CpTn\Controllers\HomeController;
use Stefan\CpTn\Repositories\AddressbookRepository;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions( ROOT_PATH . '/config/container.php' );
$container = $containerBuilder->build();

if(isset($_POST["numbers"])){
    
    $app = $container->get(HomeController::class);
    $result = $app->performDatabaseSearch($_POST["numbers"]);
    sort($result);

}

if(isset($_POST["newentry"])){

    $addressbook = $container->get(AddressbookRepository::class);
    $entryid = $addressbook->create();
    $success = "<div style=\"color:green;\"><b>SUCCESS:</b> Entry {$entryid} created!</div>";

}

require_once ROOT_PATH . '/views/home.php';

