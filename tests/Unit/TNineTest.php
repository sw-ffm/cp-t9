<?php 

$GLOBALS['keyassignments'] = require __DIR__ . '/../../config/keyassignments.php';
$GLOBALS['tnine'] = new Stefan\CpTn\TNine($GLOBALS['keyassignments']);

describe('getPattern', function(){

    it('Key returns expected pattern', function () {
        
        expect($GLOBALS['tnine']->getPattern('3'))->toBe($GLOBALS['keyassignments'][3]);
        
    });

    it('Input filter returns expected pattern', function () {
        
        expect($GLOBALS['tnine']->getPattern('a2A#?$4%.HH'))->toBe($GLOBALS['keyassignments'][2] . $GLOBALS['keyassignments'][4]);
        
    });

});