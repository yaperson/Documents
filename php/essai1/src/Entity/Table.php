<?php

namespace App\Entity;

class Table {

    private $numero;

    public function __construct($numero){
        $this->numero = $numero;
    }
    public function calculMultiply($max){
        $result = array();
        $calculation = array();
        
        for ($i=0; $i < $max ; $i++) { 
            $calculation['indice'] = $i + 1;
            $calculation['result'] = $this->numero * ($i + 1);
            $result[] = $calculation;
        }
        return $result;
    }
}