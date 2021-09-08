<?php

namespace model;

class Jugador extends Persona {

    private $numero;
    private $posicion;
    private $equipo;

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

    /**
     * @return mixed
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * @param mixed $equipo
     */
    public function setEquipo($equipo): void
    {
        $this->equipo = $equipo;
    }
}