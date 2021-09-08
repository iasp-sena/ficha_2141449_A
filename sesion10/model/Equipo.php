<?php

namespace model;

class Equipo {

    private $id;
    private $nombre;
    private $jugadores;
    private $entrenador;
    private $medico;

    public function __construct()
    {
        $this->jugadores = array();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    /**
     * @return array
     */
    public function getJugadores(): array
    {
        return $this->jugadores;
    }

    /**
     * @param array $jugadores
     */
    public function setJugadores(array $jugadores): void
    {
        $this->jugadores = $jugadores;
    }

    /**
     * @return Entrenador
     */
    public function getEntrenador(): Entrenador
    {
        return $this->entrenador;
    }

    /**
     * @param Entrenador $entrenador
     */
    public function setEntrenador(Entrenador $entrenador): void
    {
        $this->entrenador = $entrenador;
    }

    /**
     * @return Medico
     */
    public function getMedico(): Medico
    {
        return $this->medico;
    }

    /**
     * @param Medico $medico
     */
    public function setMedico(Medico $medico): void
    {
        $this->medico = $medico;
    }

}