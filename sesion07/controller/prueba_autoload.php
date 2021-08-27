<?php
require("../config/config.php");

use \controller\users\Entrenador;

echo "Vamos a instanciar un objeto de tipo Persona.<br/>";
$persona = new Entrenador();

echo "Se instanción el objeto de tipo Persona.<br/>";
/*

echo "Vamos a instanciar un objeto de tipo Equipo.<br/>";
$equipo = new Equipo("Nombre del equipo");
$equipo->setEntrenador(new Entrenador());

echo "Se instanción el objeto de tipo Equipo.<br/>";

*/