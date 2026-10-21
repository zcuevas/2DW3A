<?php
// Declara las siguientes variables utilizando el tipo de dato adecuado:
// Muestra el valor y el tipo de dato de cada variable utilizando echo, gettype() y var_dump().

$titulo = "Minecraft";
$precio = 29.99;
$unidades = 15;
$disponible = true;
$descuento = 20;
$fechaSalida = null;

$datos = [$titulo, $precio, $unidades, $disponible, $descuento, $fechaSalida];

foreach ($datos as $posicion => $valor) {
    // 1. Obtenemos el tipo de dato de la posición actual
    $tipo = gettype($valor);

    // 2. Formateamos la representación en texto para que echo no los deje vacíos
    if ($tipo === 'boolean') {
        $valorTexto = $valor ? 'true' : 'false';
    } elseif ($tipo === 'NULL') {
        $valorTexto = 'null';
    } else {
        $valorTexto = $valor;
    }

    // 3. Imprimimos la posición, el valor y su tipo
    echo "Posición [$posicion] => $valorTexto | Tipo: $tipo <br>\n";
}
?>