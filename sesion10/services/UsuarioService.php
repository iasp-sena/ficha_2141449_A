<?php

namespace services;

use model\Entrenador;
use model\Jugador;
use model\Medico;
use model\Persona;
use model\TipoDocumento;
use \services\ConexionDB;
use \PDO;

class UsuarioService
{

    public function consultarTodos(): array
    {
        $sql = "SELECT * FROM usuarios u INNER JOIN tipos_documentos tc ON tc.id = u.tipo_documento_id";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $usuarios = array();
        if ($pdoStatement->execute()) {
            while ($datoFila = $pdoStatement->fetch(PDO::FETCH_OBJ)) {
                array_push($usuarios, $this->construitObjPersona($datoFila));
            }
        } else {
            print_r($pdoStatement->errorInfo());
        }
        ConexionDB::close();
        return $usuarios;
    }

    private function construitObjPersona($datoFila): Persona
    {
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

    private function construirObjTipoDocumento($datoFila): TipoDocumento
    {
        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->setId($datoFila->tipo_documento_id);
        $tipoDocumento->setSigla($datoFila->sigla);
        $tipoDocumento->setTipo($datoFila->tipo);
        return $tipoDocumento;
    }


    public function registrarJugador(Jugador $jugador)
    {
        try {
            $conn = ConexionDB::getConn();
            $conn->beginTransaction();
            $idPersona = $this->registrarPersona($jugador);
            if ($idPersona) {
                $sql = "INSERT INTO jugadores(usuario_id,numero,posicion_id,equipo_id) VALUES(:ID,:NUM,:POS,:EQU)";
                $conn = ConexionDB::getConn();
                $pdoStatement = $conn->prepare($sql);
                $pdoStatement->bindValue(":ID", $idPersona);
                $pdoStatement->bindValue(":NUM", $jugador->getNumero());
                $pdoStatement->bindValue(":POS", $jugador->getPosicion());
                $pdoStatement->bindValue(":EQU", $jugador->getEquipo());
                if ($pdoStatement->execute()) {
                    $conn->commit();
                } else {
                    print_r($pdoStatement->errorInfo());
                    $conn->rollBack();
                }
            } else {
                echo "No se registró la persona: ". $idPersona;
                $conn->rollBack();
            }
        } catch (\Exception $e) {
            echo $e->getCode() ." - " . $e->getMessage() . "...... ". $e->getTraceAsString();
            ConexionDB::getConn()->rollBack();
        } finally {
            ConexionDB::close();
        }
    }

    public function registrarEntrenador(Entrenador $entrenador, $idEquipo)
    {
        try {
            $conn = ConexionDB::getConn();
            $conn->beginTransaction();
            $idPersona = $this->registrarPersona($entrenador);
            if ($idPersona) {
                $sql = "INSERT INTO entrenadores(usuario_id,categorias) VALUES(:ID,:CAT)";
                $conn = ConexionDB::getConn();
                $pdoStatement = $conn->prepare($sql);
                $pdoStatement->bindValue(":ID", $idPersona);
                $pdoStatement->bindValue(":CAT", $entrenador->getCategorias());
                if ($pdoStatement->execute()) {
                    $equipoService = new EquipoService();
                    $equipoService->actualizarEntrenador($idEquipo, $idPersona);
                    $conn->commit();
                } else {
                    print_r($pdoStatement->errorInfo());
                    $conn->rollBack();
                }
            } else {
                echo "No se registró la persona: ". $idPersona;
                $conn->rollBack();
            }
        } catch (\Exception $e) {
            echo $e->getCode() ." - " . $e->getMessage() . "...... ". $e->getTraceAsString();
            ConexionDB::getConn()->rollBack();
        } finally {
            ConexionDB::close();
        }
    }

    public function registrarMedico(Medico $medico, $idEquipo)
    {
        try {
            $conn = ConexionDB::getConn();
            $conn->beginTransaction();
            $idPersona = $this->registrarPersona($medico);
            if ($idPersona) {
                $sql = "INSERT INTO medicos(usuario_id,especialidad) VALUES(:ID,:ESP)";
                $conn = ConexionDB::getConn();
                $pdoStatement = $conn->prepare($sql);
                $pdoStatement->bindValue(":ID", $idPersona);
                $pdoStatement->bindValue(":ESP", $medico->getEspecialidad());
                if ($pdoStatement->execute()) {
                    $equipoService = new EquipoService();
                    $equipoService->actualizarMedico($idEquipo, $idPersona);
                    $conn->commit();
                } else {
                    print_r($pdoStatement->errorInfo());
                    $conn->rollBack();
                }
            } else {
                echo "No se registró la persona: ". $idPersona;
                $conn->rollBack();
            }
        } catch (\Exception $e) {
            echo $e->getCode() ." - " . $e->getMessage() . "...... ". $e->getTraceAsString();
            ConexionDB::getConn()->rollBack();
        } finally {
            ConexionDB::close();
        }
    }

    private function registrarPersona(Persona $persona)
    {
        $sql = "INSERT INTO usuarios(tipo_documento_id,numero_documento,nombres,apellidos,correo,nombre_usuario,clave) VALUES(:TD,:NUM_DOC,:NOM,:APE,:CORREO,:NOM_USU,:CLV)";
        $conn = ConexionDB::getConn();
        $pdoStatement = $conn->prepare($sql);
        $pdoStatement->bindValue(":TD", $persona->getTipoDocumento());
        $pdoStatement->bindValue(":NUM_DOC", $persona->getNumeroDocumento());
        $pdoStatement->bindValue(":NOM", $persona->getNombres());
        $pdoStatement->bindValue(":APE", $persona->getApellidos());
        $pdoStatement->bindValue(":CORREO", $persona->getCorreo());
        $pdoStatement->bindValue(":NOM_USU", $persona->getNombreUsuario());
        $pdoStatement->bindValue(":CLV", $persona->getClave());
        if (!$pdoStatement->execute()) {
            print_r($pdoStatement->errorInfo());
            return null;
        }
        return $conn->lastInsertId();
    }

    private function lastInsertId()
    {

    }


}