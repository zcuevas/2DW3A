<?php

// Bucle 1: Elige el número que vamos a probar (del 1 al 50)
for ($numero = 1; $numero <= 50; $numero++) {
    
    $divisores = 0; // Aquí contaremos cuántas divisiones exactas da este número

    // Bucle 2: Le hace todas las divisiones posibles (desde 1 hasta $numero)
    for ($i = 1; $i <= $numero; $i++) {
        
        // Si el resto es cero, sumamos 1 a nuestro contador
        if ($numero % $i == 0) {
            $divisores++;
        }
    }

    // Si al probar todas las divisiones solo dio exactamente 2 exactas:
    if ($divisores == 2) {
        echo "El número " . $numero . " es primo <br>";
    }
}

?>