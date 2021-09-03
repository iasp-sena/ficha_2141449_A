<?php
session_start();
define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"]);
define("CONTEXT_PATH","/ficha_2141449_A/sesion09");
define("DIR_APP", ROOT_PATH . CONTEXT_PATH);
//define("DIR_MODEL", DIR_APP . "/model");
//define("DIR_CONTROLLER", DIR_APP . "/controller");
define("DIR_VIEW", DIR_APP . "/view");





require("autoload.php");