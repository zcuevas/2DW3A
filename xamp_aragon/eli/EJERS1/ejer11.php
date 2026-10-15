<?php

echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";

// Bucle exterior para las 20 filas
for ($fila = 1; $fila <= 20; $fila++) {
    echo "<tr>"; 
    
    // Bucle interior para las 10 columnas
    for ($columna = 1; $columna <= 10; $columna++) {
        echo "<td style='padding: 8px;'>O</td>";
    }
    
    echo "</tr>";
}

echo "</table>";

?>