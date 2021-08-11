<?php
/*
$var1 = "2 3 sumar";

$arreglo = explode(" ", $var1);
$a = $arreglo[0];
$b = $arreglo[1];
$c = $arreglo[2];

echo "Los datos son: $a, $b, $c";
*/
/* Por el método GET */
/*
if(isset($_GET["numero1"]) && isset($_GET["numero2"]) && isset($_GET["operacion"])){
    $a = $_GET["numero1"];
    $b = $_GET["numero2"];
    $operacion = $_GET["operacion"];;
    
    include "./$operacion.php";
    
    $resultado = $operacion($a, $b);
    
    echo "La $operacion de $a y $b da $resultado <br/>";
}
*/

/* Por el método POST */
if(isset($_POST["numero1"]) && isset($_POST["numero2"]) && isset($_POST["operacion"])){
    $a = $_POST["numero1"];
    $b = $_POST["numero2"];
    $operacion = $_POST["operacion"];;
    
    include "./$operacion.php";
    
    $resultado = $operacion($a, $b);
    
    echo "La $operacion de $a y $b da $resultado <br/>";
}