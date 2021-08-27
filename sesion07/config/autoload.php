<?php
/*
spl_autoload_register(function ($nombreClase) {
    echo "Están solicitando la calse $nombreClase.<br/>";
    echo "Buscando dentro de 'sesion07/model/' solicitando el archivo $nombreClase.php<br/>";
    if (file_exists(DIR_MODEL . "/$nombreClase.php")) {
        require_once(DIR_MODEL . "/$nombreClase.php");
    } else if (file_exists(DIR_CONTROLLER . "/$nombreClase.php")){
        require_once(DIR_CONTROLLER . "/$nombreClase.php");
    } else if (file_exists(DIR_VIEW . "/$nombreClase.php")){
        require_once(DIR_VIEW. "/$nombreClase.php");
    }
    echo "Se ha cargado el archivo de la clase $nombreClase.<br/>";
});
*/


spl_autoload_register(function ($nombreClase) {
    echo "Están solicitando la calse $nombreClase.<br/>";
    echo "Buscando dentro de " . DIR_APP . " solicitando el archivo $nombreClase.php<br/>";
    if (file_exists(DIR_APP . "/$nombreClase.php")) {
        require_once(DIR_APP . "/$nombreClase.php");
        echo "Se ha cargado el archivo de la clase $nombreClase.<br/>";
    } else{
        echo "No se encontró el archivo para la clase: $nombreClase.<br/>";
    }
});