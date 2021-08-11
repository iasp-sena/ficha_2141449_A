<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $saludo = "Hola desde el index";

    include "./otro_php.php";


    function miFuncion($param1 = "", $param2 = ""){
        global $saludo;
        echo "Detro de la función.....<br/>";
        echo "Param1 $param1 <br/>";
        echo "Param2 $param2 <br/>";
        echo "Saludo $saludo <br/>";
    }

    function otraFuncion(){
        var_dump($_SERVER);
    }

    miFuncion("Hola", "Mundo");
    
    miFuncion();
    
    echo "<br/>-----------------------------------------------<br/>";

    var_dump($_SERVER);
    
    echo "<br/>-----------------------------------------------<br/>";

    otraFuncion();


    ?>
</body>
</html>