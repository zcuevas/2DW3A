<?php
$ciudades = ["Madrid", "Barcelona", "Londres", "New York", "Los Angeles", "Chicago"];
for ($i = 0; $i < count($ciudades); $i++) {
    echo "La ciudad con el índice " . $i . " tiene el nombre " . $ciudades[$i] . "<br>";
}
echo "Final de la ejecución";
?>