<?php
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


foreach ($videojuegos as $juego) {

    echo "<h3>" . $juego["titulo"] . "</h3>";

    switch ($juego["plataforma"]) {

        case "PC":
            echo "<p>Videojuego para ordenador</p>";
            break;

        case "PS5":
            echo "<p>Videojuego para PlayStation 5</p>";
            break;

        case "Xbox":
            echo "<p>Videojuego para Xbox</p>";
            break;

        case "Switch":
            echo "<p>Videojuego para Nintendo Switch</p>";
            break;

        default:
            echo "<p>Plataforma desconocida</p>";
            break;
    }
}
