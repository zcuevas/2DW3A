<?php
$titulo = "Minecraft";
$precio = 29.99;
$unidades = 15;
$disponible = true;
$descuento = 20;
$fechaSalida = null;

// Utiliza estructuras if/else para comprobar:
// Si el videojuego cuesta más de 30 €.
// Si quedan al menos 10 unidades.
// Si el videojuego está disponible y tiene unidades en stock.
// Si el descuento es mayor que 0 y menor o igual que 50.

if ($precio>30){
    echo "el videojuego cuesta más de 30 € <br>";
} else {
    echo "el videojuego cuesta menos de 30 € <br>";
}

if ($unidades>10){
    echo "quedan al menos 10 unidades <br>";
} else {
    echo "quedan menos 10 unidades <br>";
}

if ($unidades>0 && $disponible){
    echo "está disponible y tiene unidades en stock";
} else{
    echo "NO está disponible y tiene unidades en stock";

}

?>