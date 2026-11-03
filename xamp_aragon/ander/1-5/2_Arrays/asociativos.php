<?php
// La disponibilidad debe mostrarse como Disponible o No disponible, según su valor booleano.
$disponible = true;
$videojuego = [
    "titulo" => "Minecraft",
    "genero" => "Aventura",
    "precio" => 29.99,
    "disponible" => $disponible ? "Disponible" : "No disponible"
];

print_r($videojuego); 
echo "<br>";

// 1. Muestra el título, género, precio y disponibilidad.
echo "<br>";
foreach($videojuego as $juego){
    echo $juego . " ";
}
echo "<br>";
echo $videojuego["titulo"] . " " . $videojuego["genero"] . " " .  $videojuego["precio"] . " " .  $videojuego["disponible"];
echo "<br>";

// 2. Modifica el precio a 24.99 €.
echo "<br>";
print_r($videojuego); 
echo "<br>";
$videojuego["precio"] = 24.99;
print_r($videojuego); 
echo "<br>";

// 3. Añade una nueva clave llamada plataforma con el valor PC.
echo "<br>";
$videojuego["plataforma"] = "PC";
print_r($videojuego); 
echo "<br>";

// 4. Elimina la clave genero.
echo "<br>";
unset($videojuego["genero"]);
print_r($videojuego); 
echo "<br>";

// 5. Recorre el array utilizando foreach y muestra sus claves y valores.
echo "<br>";
foreach($videojuego as $clave => $juego){
    echo "$clave $juego <br>";
}

?>
