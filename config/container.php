<?php

use Stefan\CpTn\TNine;

return [
    TNine::class => function(){
        $key_data = require "keyassignments.php";
        return new TNine($key_data);
    }
];