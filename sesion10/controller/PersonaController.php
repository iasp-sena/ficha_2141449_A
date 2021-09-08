<?php

namespace controller;

use \model\Persona;
use \model\Jugador;
use \model\Equipo;
use \model\Entrenador;
use \model\Medico;
use services\EquipoService;
use services\PosicionJugadorService;
use services\TipoDocumentoService;
use services\UsuarioService;
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
        $tipoDocumentoService = new TipoDocumentoService();
        $equipoService = new EquipoService();
        $posicionJugadorService = new PosicionJugadorService();
        $data = [
            "titulo" => self::TITULO_REGISTRO,
            //"tiposDocumentos" => $tipoDocumentoService->consultarPorId(1)
            "tiposDocumentos" => $tipoDocumentoService->consultarTodos(),
            "equipos" => $equipoService->consultarTodos(),
            "posicionesJugador" => $posicionJugadorService->consultarTodos()
        ];
        $this->template->render("/persona/regitro_persona.php", [], [DIR_VIEW . "/persona/script_persona.php"], $data);
    }

    public function registrarPersona()
    {
        SessionController::validarSesion();
        $accion = $_POST["btnRegistroPersona"] ?? '';
        $tipoPersona = $_POST["tipoPersona"] ?? '';
        $usuarioService = new UsuarioService();
        $equipo = $_POST["equipo"];

        if ($accion === "registrar" && $tipoPersona != '') {
            switch ($tipoPersona) {
                case '1':
                    $jugador = new Jugador();
                    $jugador->setNumero($_POST["numero"]);
                    $jugador->setPosicion($_POST["posicion"]);
                    $jugador->setEquipo($equipo);
                    $this->cargarDatosPersona($jugador);
                    $usuarioService->registrarJugador($jugador);
                    break;
                case '2':
                    $entrenador = new Entrenador();
                    $entrenador->setCategorias($_POST["categorias"]);
                    $this->cargarDatosPersona($entrenador);
                    $usuarioService->registrarEntrenador($entrenador, $equipo);
                    break;
                default:
                    $medico = new Medico();
                    $medico->setEspecialidad($_POST["especialidad"]);
                    $this->cargarDatosPersona($medico);
                    $usuarioService->registrarMedico($medico, $equipo);
                    break;
            }

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
        $persona->setCorreo($_POST["correo"]);
        $persona->setNombreUsuario($_POST["username"]);
        $persona->setClave($_POST["clave"]);
    }
}


