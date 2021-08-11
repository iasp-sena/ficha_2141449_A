<?php


$a = "Hola";
$a .= " mundo";
echo $a;
/*

        1010101010
        0110110010
& =     0010100010
| =     1110111010
Ñ =     0101010101
*/

$a = 11;        //00001011
$b = 3;         //3
$c = $a << $b;  //00010110
                //00101100
                //01011000

                
$a = 11;        //00001011
$b = 3;         //3
$c = $a >> $b;  //00000101
                //00000010
                //00000001

2 == "2";    //true
2 === "2";    //false


echo 3 <=> 3;

$output = `dir`;
var_dump($output);
echo "<pre>$output</pre>";

// Estructura if
if (condicion) {
    //Código que quiera utilizar
}

if (condicion):
    //codigo que se quiera ejecutar si la condición se cumple
endif;



if (condicion):
    //codigo que se quiera ejecutar si la condición se cumple
    //Otra linea
elseif(otra_condicion): 
    //otras instrucciones
else:
    //Código si no se cumple ninguna de las condiciones
endif;