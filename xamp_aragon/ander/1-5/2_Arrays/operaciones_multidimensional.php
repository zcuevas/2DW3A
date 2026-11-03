<?php
// Utilizando el array $videojuegos después de las modificaciones anteriores
// Los cálculos deben realizarse recorriendo el array, sin escribir manualmente los resultados.
$videojuegos = [
    ["Título" => "Minecraft", "Género" => "Aventura", "Precio" => 29.99, "Disponible" => "Sí"],
    ["Título" => "EA Sports FC 25", "Género" => "Deportes", "Precio" => 49.99, "Disponible" => "Sí"],
    ["Título" => "The Legend of Zelda", "Género" => "Aventura", "Precio" => 59.99, "Disponible" => "No"],
    ["Título" => "God of War", "Género" => "Acción", "Precio" => 34.99, "Disponible" => "No"],
    ["Título" => "Hollow Knight", "Género" => "Plataformas", "Precio" => 14.99, "Disponible" => "Sí"]
];

// 1. Muestra cuántos videojuegos hay almacenados.
// solo numero
$cantidad = count($videojuegos);
echo "Total de videojuegos: " . $cantidad . "<br>";

// nombre y numero
$total = 0;
foreach ($videojuegos as $juego){
    echo $juego["Título" ] . " - ";
    $total++;
}
echo "Total de videojuegos:  " . $total;

// 2. Muestra únicamente los videojuegos disponibles.
echo "<br> <br>";
$total = 0;
foreach ($videojuegos as $juego) {
    if ($juego["Disponible"] === "Sí") {
        echo $juego["Título"] . " - ";
        $total++;
    }
}
echo "Total de videojuegos disponibles:  " . $total;

// 3. Calcula el precio total de todos los videojuegos.
echo "<br> <br>";
$precio = 0;
foreach ($videojuegos as $juego) {
    $precio += $juego["Precio"] ;
}
echo "precio total: " . $precio . "€";

// 4. Calcula el precio medio.
$precioMedio = $precio / $cantidad;
echo "<br> precio medio: " . number_format($precioMedio, 2) . " € <br>";

// 5. Identifica y muestra el título y precio del videojuego más caro.
$precios = array_column($videojuegos, "Precio");
echo "<br> - Cogemos los precios de cada juego: ";
print_r($precios);

$IndiceMasCaro = array_search(max($precios), $precios);
echo "<br> - Ahora el indice con el juego mas caro : ";
print_r($IndiceMasCaro);

echo "<br> --> El videojuego más caro es: {$videojuegos[$IndiceMasCaro]["Título"]} 
{$videojuegos[$IndiceMasCaro]["Precio"]} € <br>";

?>
