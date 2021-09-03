<?php

namespace controller;

use view\MainTemplate;

class EquipoController
{

    private $template;

    public function __construct()
    {
        $this->template = new MainTemplate();
    }

    public function verEquipo(){
        SessionController::validarSesion();
        $data = [
            "titulo"=>"Información del equipo",
            "equipo" => isset($_SESSION["equipoSesion"]) ? unserialize($_SESSION["equipoSesion"]) : null
        ];
        $this->template->render("/equipo/ver_equipo.php", [], [], $data);
    }
}