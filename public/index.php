<?php 

declare(strict_types=1);

define("ROOT_PATH", dirname(__DIR__));

require ROOT_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions( ROOT_PATH .'/config/container.php' );
$container = $containerBuilder->build();

if(isset($_POST["numbers"])){
    
    $app = $container->get('App');
    $result = $app->performDatabaseSearch($_POST["numbers"]);
    sort($result);

}

if(isset($_POST["newentry"])){

    $addressbook = $container->get("Addressbook");
    $entryid = $addressbook->create();
    $success = "<div style=\"color:green;\"><b>SUCCESS:</b> Entry {$entryid} created!</div>";

}

require_once ROOT_PATH . '/views/home.php';

