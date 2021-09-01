<?php
include("config/config.php");

$nombreControlador = $_GET["controlador"] ?? $_POST["controlador"];
$nombreMetodo = $_GET["accion"] ?? $_POST["accion"];

if ($nombreControlador) {
    $nombreControlador = "\\controller\\".$nombreControlador."Controller";
    $objControlador = new $nombreControlador();
    $objControlador->$nombreMetodo();
} else {
    $sessionController = new \controller\SessionController();
    $sessionController->index();
}

/*
 * URL ACTUAL: /regitro_persona.php?controlador=PersonaController&accion=registrar
 * URL FUTURA: /Persona/registrar
 */