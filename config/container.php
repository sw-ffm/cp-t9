<?php

use Stefan\CpTn\TNine;

return [
    TNine::class => function(){
        $key_assignments = require "keyassignments.php";
        return new TNine($key_assignments);
    }
];