<?php

namespace controller;

use \model\Persona;
use \model\Jugador;
use \model\Equipo;
use \model\Entrenador;
use \model\Medico;
use view\MainTemplate;

class PersonaController
{

    private const TITULO_REGISTRO = "Registro usuario";
    private $template;

    public function __construct()
    {
        $this->template = new MainTemplate();
    }


    public function registrar()
    {
        SessionController::validarSesion();
        $data = ["titulo"=>self::TITULO_REGISTRO];
        $this->template->render("/persona/regitro_persona.php", [], [DIR_VIEW . "/persona/script_persona.php"], $data);
    }

    public function registrarPersona()
    {
        SessionController::validarSesion();
        $accion = $_POST["btnRegistroPersona"] ?? '';
        $tipoPersona = $_POST["tipoPersona"] ?? '';

        $nombreCookie = "nombreEquipoCookie";
        $nombreEquipo = $_COOKIE[$nombreCookie] ?? "Nuestro Equipo";
        $equipo = isset($_SESSION["equipoSesion"]) ? unserialize($_SESSION["equipoSesion"]) : new Equipo($nombreEquipo);

        if ($accion === "registrar" && $tipoPersona != '') {
            switch ($tipoPersona) {
                case '1':
                    $persona = new Jugador();
                    $persona->setNumero($_POST["numero"]);
                    $persona->setPosicion($_POST["posicion"]);
                    $this->cargarDatosPersona($persona);
                    $jugadores = $equipo->getJugadores();
                    array_push($jugadores, $persona);
                    $equipo->setJugadores($jugadores);
                    break;
                case '2':
                    $persona = new Entrenador();
                    $persona->setCategorias($_POST["categorias"]);
                    $this->cargarDatosPersona($persona);
                    $equipo->setEntrenador($persona);
                    break;
                default:
                    $persona = new Medico();
                    $persona->setEspecialidad($_POST["especialidad"]);
                    $this->cargarDatosPersona($persona);
                    $equipo->setMedico($persona);
                    break;
            }
            setcookie($nombreCookie, $equipo->getNombre() . "-" . $persona->getNombres(), time() + 86400, "/");
            //echo "Vamos a registrar";
            //var_dump($equipo);
            $_SESSION["equipoSesion"] = serialize($equipo);
            $_SESSION["mensaje"] = "Se guardo en la sesíón los cambios del equipo";
        } else {
            //echo "No reconocemos la acción....";
            $_SESSION["mensaje"] = "Datos incompletos para realizar la acción";
        }

        $data = ["titulo"=>self::TITULO_REGISTRO];
        $this->template->render("/persona/regitro_persona.php", [], [DIR_VIEW . "/persona/script_persona.php"], $data);
    }

    private function cargarDatosPersona(Persona $persona)
    {
        $persona->setTipoDocumento($_POST["tipoDocumento"]);
        $persona->setNumeroDocumento($_POST["numeroDocumento"]);
        $persona->setNombres($_POST["nombres"]);
        $persona->setApellidos($_POST["apellidos"]);
    }
}


