<?php
// Dado un array de 20 elementos representa la venta del día de un comercio. Calcular el promedio de venta por día utilizando alguna estructura iterativa.Mostrar el resultado por pantalla.
$ventas =[
    1 => 7,
    2 => 42,
    3 => 15,
    4 => 89,
    5 => 3,
    6 => 64,
    7 => 21,
    8 => 98,
    9 => 35,
    10 => 12,
    11 => 77,
    12 => 50,
    13 => 6,
    14 => 91,
    15 => 28,
    16 => 83,
    17 => 44,
    18 => 19,
    19 => 72,
    20 => 56
];

$promedioDia = array_sum($ventas) / count($ventas);
echo "El promedio de venta de hoy es: " . $promedioDia . "€" . "<br>";

?>