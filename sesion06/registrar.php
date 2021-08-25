<?php
session_start();
require_once "Jugador.php";
require_once "Equipo.php";

$accion = $_POST["btnRegistroPersona"] ?? '';
$tipoPersona = $_POST["tipoPersona"] ?? '';

$nombreCookie = "nombreEquipoCookie";
$nombreEquipo =  $_COOKIE[$nombreCookie] ?? "Nuestro Equipo";
$equipo = isset($_SESSION["equipoSesion"]) ? unserialize($_SESSION["equipoSesion"]) : new Equipo($nombreEquipo);

//$_SESSION["nombreDeLavariable"];

//$_SESSION["nombreDeLavariable"] = valor;

//echo "Nombre equipo: $nombreEquipo";

;

if($accion === "registrar" && $tipoPersona != ''){
    switch ($tipoPersona) {
        case '1':
            $persona = new Jugador();
            $persona->setNumero($_POST["numero"]);
            $persona->setPosicion($_POST["posicion"]);
            cargarDatosPersona($persona);
            $jugadores = $equipo->getJugadores();
            array_push($jugadores, $persona);
            $equipo->setJugadores($jugadores);
            break;
        case '2':
            $persona = new Entrenador();
            $persona->setCategorias($_POST["categorias"]);
            cargarDatosPersona($persona);
            $equipo->setEntrenador($persona);
            break;
        default:
            $persona = new Medico();
            $persona->setEspecialidad($_POST["especialidad"]);
            cargarDatosPersona($persona);
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

function cargarDatosPersona(Persona $persona){
    $persona->setTipoDocumento($_POST["tipoDocumento"]);
    $persona->setNumeroDocumento($_POST["numeroDocumento"]);
    $persona->setNombres($_POST["nombres"]);
    $persona->setApellidos($_POST["apellidos"]);
}

header("Location: index.php");