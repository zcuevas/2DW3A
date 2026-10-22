<?php

// 1. Declaración de variables con el tipo de dato adecuado
$titulo = "Minecraft";        // string
$precio = 29.99;              // float / double
$unidades = 15;               // int
$disponible = true;           // bool
$descuento = 20;              // int
$fechaSalida = null;          // null

// 2. Muestra con echo y gettype()
echo "=== SALIDA CON ECHO Y GETTYPE() ===<br>";

echo "titulo: " . $titulo . " | Tipo: " . gettype($titulo) . "<br>";
echo "precio: " . $precio . " | Tipo: " . gettype($precio) . "<br>";
echo "unidades: " . $unidades . " | Tipo: " . gettype($unidades) . "<br>";
echo "disponible: " . ($disponible ? 'true' : 'false') . " | Tipo: " . gettype($disponible) . "<br>";
echo "descuento: " . $descuento . " | Tipo: " . gettype($descuento) . "<br>";
echo "fechaSalida: " . ($fechaSalida === null ? 'null' : $fechaSalida) . " | Tipo: " . gettype($fechaSalida) . "<br>";

echo "<br>";

// 3. Muestra con var_dump()
echo "=== SALIDA CON VAR_DUMP() ===<br>";

echo "titulo: ";
var_dump($titulo);
echo "<br>";

echo "precio: ";
var_dump($precio);
echo "<br>";

echo "unidades: ";
var_dump($unidades);
echo "<br>";

echo "disponible: ";
var_dump($disponible);
echo "<br>";

echo "descuento: ";
var_dump($descuento);
echo "<br>";

echo "fechaSalida: ";
var_dump($fechaSalida);
echo "<br>";