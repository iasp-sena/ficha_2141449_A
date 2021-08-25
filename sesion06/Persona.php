<?php

class Persona {

    private $tipoDocumento;
    private $numeroDocumento;
    private $nombres;
    private $apellidos;


    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setNumeroDocumento($numeroDocumento){
        $this->numeroDocumento = $numeroDocumento;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }
}