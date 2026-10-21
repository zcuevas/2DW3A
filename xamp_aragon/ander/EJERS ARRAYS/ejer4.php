<?php
// enumerativo 
$enumerativo = [10, 20, 30];

// asociativo
$asociativo = [
    "a" => 5,
    "b" => 15,
    "c" => 25
];

// mixto
$mixto = [
    2,               // Índice 0
    "x" => 8,        // Clave asociativa
    "y" => 12,       // Clave asociativa
    3                // Índice 1
];

// Guardar la suma de los tres arrays en una variable
$sumaTotal = array_sum($enumerativo) + array_sum($asociativo) + array_sum($mixto);

// Mostrar el resultado por pantalla
echo "La suma total de todos los elementos es: " . $sumaTotal;
?>