<?php

abstract class Persona {

    private $apodo;

    protected function Persona($apodo){
        $this->apodo = $apodo;
    }

    public function getApodo(){
        return $this->apodo;
    }

    /*final */public function setApodo($apodo){
        $this->apodo = $apodo;
    }

    public abstract function correr();
}