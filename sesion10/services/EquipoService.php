<?php

namespace services;

use model\Equipo;
use model\Entrenador;
use model\Medico;
use \PDO;

class EquipoService
{

    public function consultarTodos(): array
    {
        $sql = "SELECT * FROM equipos";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $equipos = array();
        if ($pdoStatement->execute()) {
            while ($datoFila = $pdoStatement->fetch(PDO::FETCH_OBJ)) {
                array_push($equipos, $this->construirEquipo($datoFila));
            }
        } else {
            print_r($pdoStatement->errorInfo());
        }
        ConexionDB::close();
        return $equipos;
    }

    public function actualizarEntrenador($idEquipo, $idEntrenador)
    {
        $sql = "UPDATE equipos SET entrenador_id = :ID_ENT WHERE id = :ID;";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $pdoStatement->bindValue(":ID", $idEquipo);
        $pdoStatement->bindValue(":ID_ENT", $idEntrenador);
        if (!$pdoStatement->execute()) {
            print_r($pdoStatement->errorInfo());
            return null;
        }
    }

    public function actualizarMedico($idEquipo, $idMedico)
    {
        $sql = "UPDATE equipos SET medico_id = :ID_MED WHERE id = :ID;";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $pdoStatement->bindValue(":ID", $idEquipo);
        $pdoStatement->bindValue(":ID_MED", $idMedico);
        if (!$pdoStatement->execute()) {
            print_r($pdoStatement->errorInfo());
            return null;
        }
    }

    public function consultarPorId($idEquipo): Equipo
    {
        $sql = "SELECT * FROM equipos WHERE id = :idEquipo";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $pdoStatement->bindValue(":idEquipo", $idEquipo);
        $equipo = null;
        if ($pdoStatement->execute()) {
            if ($datoFila = $pdoStatement->fetch(PDO::FETCH_OBJ)) {
                $equipo = $this->construirEquipo($datoFila);
            }
        } else {
            print_r($pdoStatement->errorInfo());
        }
        ConexionDB::close();
        return $equipo;
    }

    private function construirEquipo($datoFila): Equipo
    {
        $equipo = new Equipo();
        $equipo->setId($datoFila->id);
        $equipo->setNombre($datoFila->nombre);
        $equipo->setEntrenador($this->construirEntrenador($datoFila));
        $equipo->setMedico($this->construirMedico($datoFila));
        return $equipo;
    }

    private function construirMedico($datosFila): Medico
    {
        $medico = new Medico();
        $medico->setId($datosFila->medico_id);
        return $medico;
    }

    private function construirEntrenador($datosFila): Entrenador
    {
        $entrenador = new Entrenador();
        $entrenador->setId($datosFila->entrenador_id);
        return $entrenador;
    }
}