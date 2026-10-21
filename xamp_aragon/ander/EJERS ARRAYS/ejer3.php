<?php
//Definir un array que tenga como valor diez títulos de películas. Utilizar la función sort para ordenarlos de forma alfabética y mostrarlo por pantalla con print_r.

$peliculas = [
    'El padrino',
    'Pulp Fiction',
    'Cadena perpetua',
    'Matrix',
    'El viaje de Chihiro',
    'El señor de los anillos: La comunidad del anillo',
    'El caballero oscuro',
    'Origen',
    'Parásitos',
    'Oppenheimer'
];

sort($peliculas);
print_r($peliculas);

?>