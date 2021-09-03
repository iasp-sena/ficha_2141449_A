<?php

namespace services;

use model\Persona;
use model\TipoDocumento;
use \services\ConexionDB;
use \PDO;

class UsuarioService
{

    public function consultarTodos() : array{
        $sql = "SELECT * FROM usuarios u INNER JOIN tipos_documentos tc ON tc.id = u.tipo_documento_id";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $usuarios = array();
        if($pdoStatement->execute()) {
            while($datoFila = $pdoStatement->fetch(PDO::FETCH_OBJ)){
                array_push($usuarios, $this->construitObjPersona($datoFila));
            }
        } else{
            print_r($pdoStatement->errorInfo());
        }
        ConexionDB::close();
        return $usuarios;
    }

    private function construitObjPersona($datoFila) : Persona{
        $persona = new Persona();
        $persona->setId($datoFila->id);
        $persona->setTipoDocumento($this->construirObjTipoDocumento($datoFila));
        $persona->setNombres($datoFila->nombres);
        $persona->setApellidos($datoFila->apellidos);
        $persona->setCorreo($datoFila->nombres);
        $persona->setNombreUsuario($datoFila->nombre_usuario);
        $persona->setClave($datoFila->clave);
        return $persona;
    }

    private function construirObjTipoDocumento($datoFila) : TipoDocumento{
        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->setId($datoFila->tipo_documento_id);
        $tipoDocumento->setSigla($datoFila->sigla);
        $tipoDocumento->setTipo($datoFila->tipo);
        return $tipoDocumento;
    }
}