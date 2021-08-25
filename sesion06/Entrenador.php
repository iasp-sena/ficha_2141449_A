<?php

require_once "Persona.php";

class Entrenador extends Persona {

    private $categorias;


    /**
     * @return mixed
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * @param mixed $categorias
     */
    public function setCategorias($categorias): void
    {
        $this->categorias = $categorias;
    }

}