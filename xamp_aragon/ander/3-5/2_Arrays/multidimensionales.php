<?php
// Cada videojuego debe representarse mediante un array asociativo y todos ellos deben almacenarse dentro de un array indexado
$videojuegos = [
    ["Título" => "Minecraft", "Género" => "Aventura", "Precio" => 29.99,  "Disponible" => "Sí"],
    ["Título" => "EA Sports FC 25", "Género" => "Deportes", "Precio" => 49.99,  "Disponible" => "Sí"],
    ["Título" => "The Legend of Zelda", "Género" => "Aventura","Precio" => 59.99, "Disponible" => "No"],
    ["Título" => "Mario Kart 8", "Género" => "Carreras", "Precio" => 39.99, "Disponible" => "Sí"],
    ["Título" => "God of War", "Género" => "Acción" ,"Precio" => 44.99, "Disponible" => "No"]
];
// 1. Muestra el título y el precio del primer videojuego.
echo "primer videojuego: {$videojuegos[0]["Título"]} {$videojuegos[0]["Precio"]}€ <br>";

// 2. Muestra el género del tercer videojuego
echo "el género del tercer videojuego: {$videojuegos[2]["Género"]} <br>";

// 3. Añade un nuevo videojuego: Hollow Knight, género Plataformas, precio 14.99 € y disponible.
echo "<br>";
print_r($videojuegos);
echo "<br>";

$videojuegos[] = ["Título" => "Hollow Knight", "Género" => "Plataformas" ,"Precio" => 14.99, "Disponible" => "Sí"];
echo "<br>";
print_r($videojuegos);
echo "<br>";

// 4. Modifica el precio de God of War a 34.99 €.
$indice = array_search("God of War", array_column($videojuegos, "Título"));
echo "<br>";
echo "{$videojuegos[$indice]["Título"]} {$videojuegos[$indice]["Precio"]}€";
echo "<br>";
$videojuegos[$indice]["Precio"] = 34.99;
echo "{$videojuegos[$indice]["Título"]} {$videojuegos[$indice]["Precio"]}€";
echo "<br>";


// 5. Elimina Mario Kart 8 del array.
echo "<br>";
print_r($videojuegos);
echo "<br>";
$indice = array_search("Mario Kart 8", array_column($videojuegos, "Título"));
unset($videojuegos[$indice]);
$videojuegos = array_values($videojuegos);
echo "<br>";
print_r($videojuegos);
echo "<br>";
echo "<br>";

// 6. Recorre el array mediante foreach y muestra todos los videojuegos en una tabla
// con las columnas: título, género, precio y disponibilidad.
?>
<html>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr> 
            <th>Título</th>
            <th>Género</th>
            <th>Precio</th>
            <th>Disponible</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($videojuegos as $juego): ?>
            <tr> 
                <td><?= $juego['Título'] ?></td>
                <td><?= $juego['Género'] ?></td>
                <td><?= $juego['Precio'] ?> €</td>
                <td><?= $juego['Disponible'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</html>