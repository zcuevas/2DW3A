<?php
// Realizar un programa que en base al valor numérico de una variable que puede estar entre 1 y 7, 
// se imprima por pantalla el día de la semana asociado. 
// Por ejemplo 1 -> Domingo, 2 -> Lunes… etc. Utiliza switch case 
$numero = 3;
$diasSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado","Domingo"]; 

if ($numero >= 1 && $numero<= 7 ){
    $dia = $diasSemana[$numero - 1];

    echo "dia seleccionado: " . $dia . "<br>";
    echo "numero: " . $numero;

} else {
    echo "numero no valido";
}


/* switch($numero) {
    case ($numero >= 1 && $numero<= 7):
        $dia = $diasSemana[$numero - 1];
        echo "dia seleccionado: " . $dia . "<br>";
        echo "numero: " . $numero;
        break;
    default:
        echo "numero no valido";
}
*/


?>