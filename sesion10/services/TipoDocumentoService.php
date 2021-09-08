<?php

namespace services;

use model\TipoDocumento;
use \PDO;

class TipoDocumentoService
{


    public function consultarTodos() : array{
        $sql = "SELECT * FROM tipos_documentos";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $tiposDocumentos = array();
        if($pdoStatement->execute()) {
            while($datoFila = $pdoStatement->fetch(PDO::FETCH_OBJ)){
                array_push($tiposDocumentos, $this->construirObjTipoDocumento($datoFila));
            }
        } else{
            print_r($pdoStatement->errorInfo());
        }
        ConexionDB::close();
        return $tiposDocumentos;
    }

    public function consultarPorId($idTipoDocumento) : array{
        $sql = "SELECT * FROM tipos_documentos WHERE id = :idTipoDoc";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $pdoStatement->bindValue(":idTipoDoc", $idTipoDocumento);
        $tiposDocumentos = array();
        if($pdoStatement->execute()) {
            while($datoFila = $pdoStatement->fetch(PDO::FETCH_OBJ)){
                array_push($tiposDocumentos, $this->construirObjTipoDocumento($datoFila));
            }
        } else{
            print_r($pdoStatement->errorInfo());
        }
        ConexionDB::close();
        return $tiposDocumentos;
    }

    private function construirObjTipoDocumento($datoFila) : TipoDocumento{
        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->setId($datoFila->id);
        $tipoDocumento->setSigla($datoFila->sigla);
        $tipoDocumento->setTipo($datoFila->tipo);
        return $tipoDocumento;
    }
}