<?php

require_once 'Persona.php';

class Jugador extends Persona {

    private $numero;
    private $posicion;

    public function getNumero(){
        return $this->numero;
    }

    public function getPosicion(){
        return $this->posicion;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setPosicion($posicion){
        $this->posicion = $posicion;
    }
    
}