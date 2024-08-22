<?php 

declare(strict_types=1);

namespace Stefan\CpTn;

class TNine 
{

    private $pattern;

    private $key_assignments;

    public function __construct()
    {
        $this->key_assignments = require __DIR__ . '/../config/keyassignments.php';
    }
        
    /**
     * getPattern
     *
     * @param  mixed $numbers
     * @return string
     */
    public function getPattern(string $numbers) : string 
    {

        $numbers = preg_replace('/[^0-9]/', '', $numbers);
        
        $this->pattern = "";
    
        foreach(str_split($numbers) as $number){

            if(isset($this->key_assignments[(int)$number])){

                $this->pattern .= $this->key_assignments[(int)$number];

            }

        }

        return $this->pattern;
    }

}