<?php

$i = 0;
while($i<=10){
    echo "$i , ";



    $i++;
}
echo "<br/>***********************************<br/>";
for($i = 0, $j=2, $k=1,  mostrarMensaje("Iniciamos...."); 
    $i<=10; 
    $i++, $j +=2,$k-=3,  mostrarMensaje("Otra iteración...")){
    echo "$i , $j, $k <br/>";
}

function mostrarMensaje($mensaje){
    echo $mensaje;
}





echo "<br/>***********************************<br/>";
echo "<br/>***********************************<br/>";
echo "<br/>***********************************<br/>";

//foreach

$frutas = ["manzana", "peras","bananos","uvas"];




foreach( $frutas as $fruta){
    echo $fruta . ", ";
}

echo "<br/>***********************************<br/>";

foreach($frutas as $posicion => $fruta){
    echo "Clave es: $posicion => Valor: $fruta <br/>";
}



echo "<br/>***********************************<br/>";
echo "<br/>***********************************<br/>";
echo "<br/>***********************************<br/>";


$datosUsuario = [
    "nombres" => "Carlos", 
    "apellidos" => "Castro",
    "tipoDocumento" => "TI",
    "numeroDocumento" => "1234567890"
];

foreach($datosUsuario as $propiedad => $valor){
    if($propiedad === "tipoDocumento" 
        && $valor === "TI"){
        echo "Es menor de edad, chao...";
        break;
    }
    echo "Clave es: $propiedad => Valor: $valor <br/>";
}


echo "<br/>***********************************<br/>";
echo "<br/>***********************************<br/>";
echo "<br/>***********************************<br/>";



foreach($datosUsuario as $propiedad => $valor){
    if($propiedad === "tipoDocumento" 
        && $valor === "TI"){
        echo "Es menor de edad, chao...<br/>";
        continue;
    }
    echo "Clave es: $propiedad => Valor: $valor <br/>";
}















