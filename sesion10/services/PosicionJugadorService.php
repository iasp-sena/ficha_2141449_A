<?php

namespace services;

use model\PosicionJugador;
use \PDO;

class PosicionJugadorService
{

    public function consultarTodos() : array{
        $sql = "SELECT * FROM posiciones_jugador";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $posicionesJugadores = array();
        if($pdoStatement->execute()) {
            while($datoFila = $pdoStatement->fetch(PDO::FETCH_OBJ)){
                array_push($posicionesJugadores, $this->construirObjPosicionJugador($datoFila));
            }
        } else{
            print_r($pdoStatement->errorInfo());
        }
        ConexionDB::close();
        return $posicionesJugadores;
    }

    private function construirObjPosicionJugador($datoFila) : PosicionJugador{
        $posicionJugador = new PosicionJugador();
        $posicionJugador->setId($datoFila->id);
        $posicionJugador->setNombre($datoFila->nombre);
        return $posicionJugador;
    }
}