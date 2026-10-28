<?php
// Array multidimensional con los videojuegos de la tienda.
// Cada videojuego incluye la edad del usuario que quiere comprarlo.
$videojuegos = [
[
"titulo" => "Minecraft",
"genero" => "Aventura",
"plataforma" => "PC",
"precio" => 29.99,
"stock" => 8,
"edadMinima" => 7,
"edadUsuario" => 15
],
[
"titulo" => "EA Sports FC 25",
"genero" => "Deportes",
"plataforma" => "PS5",
"precio" => 49.99,
"stock" => 0,
"edadMinima" => 3,
"edadUsuario" => 16
],
[
"titulo" => "The Legend of Zelda",
"genero" => "Aventura",
"plataforma" => "Switch",
"precio" => 59.99,
"stock" => 5,
"edadMinima" => 12,
"edadUsuario" => 10
],
[
"titulo" => "Mario Kart 8",
"genero" => "Carreras",
"plataforma" => "Switch",
"precio" => 39.99,
"stock" => 12,
"edadMinima" => 3,
"edadUsuario" => 8
],
[

"titulo" => "God of War",
"genero" => "Acción",
"plataforma" => "PS5",
"precio" => 44.99,
"stock" => 0,
"edadMinima" => 18,
"edadUsuario" => 20
]
];



/* 1. Comprueba si el videojuego tiene stock. Si tiene unidades disponibles, muestra un mensaje indicando cuántas quedan; 
en caso contrario, muestra «Agotado». */

foreach ($videojuegos as $juego) {
    echo $juego["titulo"] . " - ";
    
    if ($juego["stock"] > 0) {
        echo "quedan disponibles: " . $juego["stock"] . "<br>";
    } else {
        echo "Agotado<br>";
    }
}

/*2. Clasifica el precio del videojuego según estos criterios:

■ Menos de 20 € = Económico
■ Entre 20 € y 50 € (incluidos) = Precio medio
■ Más de 50 € = Caro */
echo "<br>";
foreach ($videojuegos as $juego) {

    if ($juego["precio"] < 20) {
        echo $juego["titulo"] . " - Económico <br>";
   
        } elseif ($juego["precio"] >= 20 &&$juego["precio"] <= 50 ) {
            echo $juego["titulo"] . " - Precio medio <br>";
    
        } else{
            echo $juego["titulo"] . " - Caro <br>";
            
    }
}


// 3. Comprueba si el usuario tiene la edad mínima necesaria para jugar.
echo "<br>";
foreach ($videojuegos as $juego) {

    if ($juego["edadMinima"] <= $juego["edadUsuario"]) {
        echo $juego["titulo"] . " - El usuario puede jugar <br>";
   
        } else{
            echo $juego["titulo"] . " - El usuario NO puede jugar <br>";
            
    }
}



/* 4. Comprueba si el usuario puede comprar el videojuego. Para ello, debe cumplir ambas condiciones: 
tener la edad mínima y existir stock disponible. */

echo "<br>";
foreach ($videojuegos as $juego) {

    if ($juego["edadMinima"] <= $juego["edadUsuario"] && $juego["stock"] > 0) {
        echo $juego["titulo"] . " - El usuario comprar el juego <br>";
   
        } else{
            echo $juego["titulo"] . " - El usuario NO puede comprar el juego <br>";            
    }
}

?>