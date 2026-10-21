<?php
$ciudades = [
    "md" =>"Madrid",
    "bd" =>"Barcelona",
    "ld" =>"Londres",
    "ny" =>"New York",
    "la" =>"Los Angeles",
    "ch" =>"Chicago"
];

foreach ($ciudades as $indice => $ciudad) {
    echo "La ciudad con el indice " . $indice . " tiene el nombre " . $ciudad . "." . "<br>";
}
echo "Final de la ejecución.";

?>  