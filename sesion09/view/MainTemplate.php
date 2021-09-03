<?php

namespace view;

class MainTemplate
{
    public function render($urlContenido, $styles = [], $scripts = [], $data = [])
    {
        include DIR_VIEW . "/template/main/head.php";

        include DIR_VIEW . $urlContenido;

        include DIR_VIEW . "/template/main/footer.php";
    }
}