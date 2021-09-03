<?php

namespace view;

class LoginTemplate
{
    public function render($urlContenido = "/login.php", $styles = [], $scripts = [], $data = [])
    {
        include DIR_VIEW . "/template/login/head.php";

        include DIR_VIEW . $urlContenido;

        include DIR_VIEW . "/template//login/footer.php";
    }
}