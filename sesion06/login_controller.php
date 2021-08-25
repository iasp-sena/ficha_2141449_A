<?php
session_start();
require_once "Jugador.php";
require_once "Equipo.php";

$accion = $_POST["btnIngreso"] ?? '';
$tipoPersona = $_POST["tipoPersona"] ?? '';


//$_SESSION["nombreDeLavariable"];

//$_SESSION["nombreDeLavariable"] = valor;

//echo "Nombre equipo: $nombreEquipo";

;
$urlRedirect = "login.php";
if ($accion === "ingresar") {

    $usuario = $_POST["usuario"] ?? '';
    $clave = $_POST["clave"] ?? '';

    if ($usuario != '' && $clave != '') {

        if ($usuario == 'pperez' && $clave == '123456') {
            $_SESSION["usuarioSesion"] = "Pedro Pérez";
            $_SESSION["mensaje"] = "Bienvenido....";
            $urlRedirect = "index.php";
        } else {
            $_SESSION["mensaje"] = "Credenciales invalidas";
        }

    } else {
        $_SESSION["mensaje"] = "Los campos de usuario y clave son obligatorios";
    }
} else {
    //echo "No reconocemos la acción....";
    $_SESSION["mensaje"] = "Acción no permitida";
}

header("Location: $urlRedirect");