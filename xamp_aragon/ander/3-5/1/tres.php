<?php

// 1. Declaración de variables
$titulo = "Minecraft";
$precio = 29.99;
$unidades = 15;
$disponible = true;
$descuento = 20;
$fechaSalida = null;

// 2. Muestra individual con echo y gettype()
echo "=== SALIDA CON ECHO Y GETTYPE() ===<br>\n";

echo '$titulo: ' . $titulo . ' | Tipo: ' . gettype($titulo) . "<br>\n";
echo '$precio: ' . $precio . ' | Tipo: ' . gettype($precio) . "<br>\n";
echo '$unidades: ' . $unidades . ' | Tipo: ' . gettype($unidades) . "<br>\n";
echo '$disponible: ' . ($disponible ? 'true' : 'false') . ' | Tipo: ' . gettype($disponible) . "<br>\n";
echo '$descuento: ' . $descuento . ' | Tipo: ' . gettype($descuento) . "<br>\n";
echo '$fechaSalida: ' . ($fechaSalida === null ? 'null' : $fechaSalida) . ' | Tipo: ' . gettype($fechaSalida) . "<br>\n";

echo "<br>\n";

// 3. Muestra agrupada usando array + foreach + var_dump()
echo "=== SALIDA CON ARRAY + FOREACH + VAR_DUMP() ===<br>\n";

$datos = [
    'titulo'      => $titulo,
    'precio'      => $precio,
    'unidades'    => $unidades,
    'disponible'  => $disponible,
    'descuento'   => $descuento,
    'fechaSalida' => $fechaSalida
];


foreach ($datos as $nombreVariable => $valor) {
    echo "$nombreVariable: ";
    var_dump($valor);
    echo "<br>\n";
}