<?php 

require __DIR__ . '/../vendor/autoload.php';

$keyassignments = require 'keyassignments.php';

use Stefan\CpTn\App;
use Stefan\CpTn\Controller\Addressbook;
use Stefan\CpTn\Database;
use Stefan\CpTn\TNine;
use function DI\create;
use function DI\get;

return [

    'TNine' => create(TNine::class)->constructor($keyassignments),
    'Database' => create(Database::class),
    'App' => create(App::class)->constructor(get('TNine'), get('Database')),
    'Addressbook' => create(Addressbook::class)->constructor(get('Database'))
];
