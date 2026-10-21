<?php
$paises = array('alemania', 'brasil', 'italia', 'chile', 'uruguay', 'australia');

// 1. Eliminar elementos 
$paises = array_diff($paises, ['alemania', 'italia', 'australia']);

// 2. Insertar elementos 
array_push($paises, 'argentina', 'bolivia');

// 3. Orden alfabético
sort($paises);

// 4. Mostrar el resultado 
print_r($paises);
?>