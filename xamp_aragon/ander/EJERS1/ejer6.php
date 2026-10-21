<?php
// Realizar un programa que en base al valor numérico de una variable que puede estar entre 1 y 7, 
// se imprima por pantalla el día de la semana asociado. 
// Por ejemplo 1 -> Domingo, 2 -> Lunes… etc. Utiliza switch case 
$numero = 3;
$diasSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado","Domingo"]; 

switch ($numero) {
    case 1:
        echo $diasSemana[0];
        break;
    case 2:
        echo $diasSemana[1];
        break;
    case 3:
        echo $diasSemana[2];
        break;
    case 4:
        echo $diasSemana[3];
        break;
    case 5:
        echo $diasSemana[4];
        break;
    case 6:
        echo $diasSemana[5];
        break;
    case 7:
        echo $diasSemana[6];
        break;
    default:
        echo "Número inválido. Debe estar entre 1 y 7.";
}



?>