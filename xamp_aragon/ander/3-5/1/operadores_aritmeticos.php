<?php
$titulo = "Minecraft";
$precio = 29.99;
$unidades = 15;
$disponible = true;
$descuento = 20;
$fechaSalida = null;

// Precio total de todas las unidades disponibles.
$precioTotal = 0.00;
$unidadesRestantes = $unidades;

//esto es lit una *  y ya 
do {
    $precioTotal += $precio;
    $unidadesRestantes--;
} while ($unidadesRestantes > 0);

echo "El precio total de $unidades unidades de $titulo es: $precioTotal € <br>";    


// Precio del videojuego después de aplicar el descuento.
function aplicarDescuento($descuento, $precio) {
    $montoDescuento = ($descuento / 100) * $precio;
    $precioConDescuento = $precio - $montoDescuento;

    // 2. Devolver el resultado
    return $precioConDescuento;
}

$precioFinalUnitario = aplicarDescuento($descuento, $precio);
echo "Precio $precio con $descuento% de descuento: $precioFinalUnitario € <br>";

// Precio de cinco unidades con el descuento aplicado.
$precioCincoUnidades = aplicarDescuento($descuento, $precio) * 5;
echo $precioCincoUnidades;

// Unidades restantes después de vender cuatro videojuegos.


?>