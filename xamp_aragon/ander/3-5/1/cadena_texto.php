<?php
$titulo = "Minecraft";
$precio = 29.99;
$unidades = 15;
$disponible = true;
$descuento = 20;
$fechaSalida = null;

// Crea una frase utilizando concatenación con el operador .
echo $titulo . " cuesta " . $precio . "€" . "<br>";

// Muestra el título del videojuego en mayúsculas y minúsculas.
$tituloMayus = strtoupper($titulo);
$tituloMinus = strtolower($titulo);
echo $tituloMayus . "<br>" . $tituloMinus . "<br>";

// Calcula el número de caracteres del título.
$caracteres = mb_strlen($titulo);
echo $caracteres . "<br>";

// Muestra una frase utilizando comillas dobles e interpolación de variables.
echo "$titulo  cuesta  $precio € <br>";

// Comprueba qué ocurre al utilizar comillas simples.
echo '$titulo  cuesta  $precio € <br>';


?>