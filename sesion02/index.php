<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola PHP (Soy HTML)</h1>
    <?php echo("Hola soy PHP"); ?>
    <?php echo "<h3>Hola yo también soy PHP</h3>"; ?>

    <?php
    $numero = 12;

    echo gettype($numero) . "<br/>";

    $numero = "Soy un texto" ;
    
    echo gettype($numero) . "<br/>";

    $boolean = true;
    $flotante = 12.8;
    $numeroEnHexa = 0x4F;
    $numeroString = "12.0";
    $resultado = $flotante / $numeroString;

    echo "Boolean: " . $boolean . "<br/>";
    echo "Flotante: $flotante <br/>";
    echo 'Flotante: $flotante <br/>';
    echo "Hexa: $numeroEnHexa <br/>";


    echo "Resultado: $resultado <br/>";

    $arreglo1 = array();
    $arreglo1 = array(1,2,3);

    echo "Arreglo 1: " . var_export($arreglo1) . "  <br/>";
    echo "-----------------------------------------------<br/>";
    var_dump($arreglo1);
    echo "<br/>";

    echo "Valor en la posición 0: " . $arreglo1[0] . "<br/>";
    echo "Valor en la posición 1: " . $arreglo1[1] . "<br/>";
    echo "Valor en la posición 2: " . $arreglo1[2] . "<br/>";

    echo "<br/>-----------------------------------------------<br/>";
    echo "-----------------------------------------------<br/>";
    

    $arreglo2 = array();
    $arreglo2 = array(
        "clave1" => 1,
        "clave2" => "Pedro",
        "clave3" => 3.5
    );

    echo "Arreglo 1: " . var_export($arreglo2) . "  <br/>";
    
    echo "Valor en la posición 'clave1': " . $arreglo2["clave1"] . "<br/>";
    echo "Valor en la posición 'clave2': " . $arreglo2["clave2"] . "<br/>";
    echo "Valor en la posición 'clave3': " . $arreglo2["clave3"] . "<br/>";




    $var1 = "Hola";
    $var2 = $var1;

    echo "Var 1: $var1 <br/>";
    echo "Var 2: $var2 <br/>";

    $var2 .= " Mundo";
    
    echo "Var 1: $var1 <br/>";
    echo "Var 2: $var2 <br/>";
    
    echo "-----------------------------------------------<br/>";

    $var1 = "Hola";
    $var2 = &$var1;

    echo "Var 1: $var1 <br/>";
    echo "Var 2: $var2 <br/>";

    $var2 .= " Mundo";
    
    echo "Var 1: $var1 <br/>";
    echo "Var 2: $var2 <br/>";

    ?>
    <br/>

</body>
</html>

<?php
echo "Fin de php.";