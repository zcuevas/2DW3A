<?php
//Definir un array de 5 elementos y asignar a cada uno de ellos un número. 
$numeros = [1, 2, 3, 4, 5];

//Calcular el promedio de los números.
$suma = array_sum($numeros);
$promedio = $suma / count($numeros);

//Mediante una estructura condicional, determinar si el promedio de los números son mayores o menores que 6. 
//Mostrar un mensaje por pantalla informando el resultado.
if ($promedio > 6) {
    echo "El promedio es $promedio y es MAYOR que 6.";
} elseif ($promedio < 6) {
    echo "El promedio es $promedio y es MENOR que 6.";
} else {
    echo "El promedio es $promedio y es IGUAL a 6.";
}

?>