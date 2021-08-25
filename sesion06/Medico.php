<?php

require_once "Persona.php";

class Medico extends Persona {

    private $especialidad;

    /**
     * @return mixed
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * @param mixed $especialidad
     */
    public function setEspecialidad($especialidad): void
    {
        $this->especialidad = $especialidad;
    }

}