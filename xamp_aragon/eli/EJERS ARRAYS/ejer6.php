<?php
// Las caras del dado
$dado = [1, 2, 3, 4, 5, 6];

// Obtener un valor al azar 
$resultado = $dado[array_rand($dado)];

// Mostrar el resultado por pantalla
echo "Cara del dado: " . $resultado;
?>  