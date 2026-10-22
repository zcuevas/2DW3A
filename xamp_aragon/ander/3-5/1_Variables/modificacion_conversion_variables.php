<?php
$titulo = "Minecraft";
$precio = 29.99;
$unidades = 15;
$disponible = true;
$descuento = 20;
$fechaSalida = null;

// Modifica el precio inicial del videojuego.
// Incrementa en cinco las unidades disponibles.
$unidades += 5;
echo $unidades . "<br>";

// Convierte la cadena "25" a un número entero.
$cadena = "25";
$entero = (int)$cadena;
var_dump($entero);
echo $entero . "<br>";

// Convierte la cadena "19.95" a un número decimal.
$cadenaDecimal = "19.95";
$decimal = (float)$cadenaDecimal;
var_dump($decimal);
echo "<br>";

// Muestra el tipo de dato antes y después de cada conversión.
echo gettype($precio);
echo "<br>";
echo gettype($cadena);
echo "<br>";
echo gettype($entero);
echo "<br>";
echo gettype($cadenaDecimal);
echo "<br>";
echo gettype($decimal);





?>