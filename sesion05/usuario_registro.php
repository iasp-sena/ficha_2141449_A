<?php

include_once("Usuario.php");
$tipoDoc = $_GET["tipoDocumento"];
$numDoc = $_GET["numeroDocumento"];
$nombres = $_GET["nombres"];
$apellidos = $_GET["apellidos"];
$correo = $_GET["email"];
$telefono = $_GET["telefono"];
$btn = $_GET["btnRegistroUsuario"];


$datos = array(
    "tipoDocumento" => $tipoDoc,
    "numeroDocumento" => $numDoc,
    "nombres" => $nombres,
    "apellidos" => $apellidos,
    "correo" => $correo
);

/*
function saludar($nombre){
    echo "hola $nombre.....";
}

$funcionAEjecutar = "saludar";
$funcionAEjecutar("Andrés");
*/
$propiedad = "edad";

$usuario = new Usuario();
$usuario->setTipoDocumento($tipoDoc);
$usuario->setNumeroDocumento($numDoc);
$usuario->nombres = $nombres;
$usuario->apellidos = $apellidos;
$usuario->correo = $correo;
$usuario->telefonos = $telefono;

$usuario->cambiarUniforme("Negro");
$usuario->saludar();


$usuario2 = new Usuario();
$usuario2->cambiarUniforme("Rojo");
$usuario2->setApodo("Gatitos");
$usuario2->saludar();
$usuario2->correr();

echo "<br/>El valor del uniforme desde fuera de la clase es" . Usuario::$uniforme . "<br/>";



/*
$persona = new Persona("Apodo persona");
echo "<br/>El Apodo de la persona es: " . $persona->getApodo() . "<br/>";
*/




echo "Los valores recibidos son: <br/>".
"TD: $tipoDoc <br/>".
"DOC: $numDoc <br/>".
"NOM: $nombres <br/>".
"APE: $apellidos <br/>".
"EMAIL: $correo <br/>".
"TEL: $telefono <br/>".
"BTN: $btn <br/>";

var_dump($datos);echo "<br/>------------<bt/>";
var_dump($telefono);echo "<br/>------------<bt/>";
var_dump($usuario);echo "<br/>------------<bt/>";