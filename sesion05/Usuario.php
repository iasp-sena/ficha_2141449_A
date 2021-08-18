<?php

require_once "Persona.php";
require_once "Atleta.php";

class Usuario extends Persona implements Atleta {

    public const UNA_CONSTANTE = "Valor de la constante";

    public static $uniforme = "Azul";

    private $tipoDocumento;
    protected $numeroDocumento;
    public $nombres;
    public $apellidos;
    public $correo;
    public $telefonos;

    /*
    public function Usuario(){
        echo "<br/>Inicializando el objeto Usuario......<br/>";
    } 
    */

    public function __construct($tipoDocumento = "", $numeroDocumento = null){
        echo "<br/>Inicializando el objeto Usuario de otra forma......<br/>";
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
        parent::__construct("Perrito");
    }

    public function __destruct(){
        echo "<br/>Destruyendo el objeto Usuario.....<br/>";
    }


    public function setTipoDocumento($tipoDocumento){
        $this->tipodDocumento = $tipoDocumento;
    }

    public function setNumeroDocumento($numeroDocumento){
        $this->numeroDocumento = $numeroDocumento;
    }

    public function cambiarUniforme($nuevoUniforme){
        self::$uniforme = $nuevoUniforme;
    }
    
    public function setApodo($apodo){
        parent::setApodo($apodo . "-" . $apodo);
    }

    public function saludar(){
        echo "<br/>Saludando con el uniforme " . self::$uniforme . "<br/>";
        echo "<br/>El valor de la constante es: " . self::UNA_CONSTANTE . "<br/>";
        echo "<br/>El valor del apodo es: " . parent::getApodo() . "<br/>";
    }

    public function correr(){
        echo "<br/>Corriendo desde usuario................";
    }

    public function entrenar(){
        echo "<br/>Entrando desde usuario por que es un atleta................";
    }

}