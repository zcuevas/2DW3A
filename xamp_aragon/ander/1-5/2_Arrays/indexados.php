<?php
//Crea un array indexado llamado $titulos que contenga los siguientes videojuegos:
$titulos = ["Minecraft", "FIFA 25", "The Legend of Zelda", "Mario Kart 8", "God of War"];

// 1. Muestra el primer y el último videojuego
$primero = $titulos[0];
$ultimo = $titulos[array_key_last($titulos)];
echo $primero . "<br>" . $ultimo . "<br>";

// 2. Muestra el número total de elementos utilizando count()
$totalElementos = count($titulos);
echo $totalElementos . "<br>";

// 3. Añade el videojuego “Hollow Knight” al final del array
$titulos[] = "Hollow Knight";
print_r($titulos); 
echo "<br>";

// 4. Modifica “FIFA 25” por “EA Sports FC 25”
$indiceFifa = array_search("FIFA 25",$titulos);
echo "indice: ". $indiceFifa ."<br>";
$titulos[$indiceFifa] = "EA Sports FC 25";
print_r($titulos); 
echo "<br>";

// 5. Elimina “Mario Kart 8” del array
$indiceMario= array_search("Mario Kart 8",$titulos);
echo "indice: ". $indiceMario ."<br>";
unset($titulos[$indiceMario]);
$titulos = array_values($titulos);
print_r($titulos); 
echo "<br>";

// 6. Recorre el array mediante foreach y muestra todos los títulos
echo "<br>";

foreach($titulos as $titulo){
    echo $titulo ."<br>";
}

?>
