<?php 
include "datos.php"; 

// Si han dado a enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $busqueda = trim($_POST["busqueda"] ?? ""); 

    if ($busqueda == "") {
        echo "<p>Escribe algo para buscar.</p>";
    } else {
        // La función está en datos.php
        $resultados = buscar_series($busqueda);

        if (count($resultados) == 0) {
            echo "<p>No se encontró ninguna serie con \"" . htmlspecialchars($busqueda) . "\".</p>";
        } else {
            echo "<h2>Resultados (" . count($resultados) . "):</h2>";

            foreach ($resultados as $serie) {
                echo "<p>";
                echo "Título: " . htmlspecialchars($serie["titulo"]) . "<br>";
                echo "genero: "  . htmlspecialchars($serie["genero"])  . "<br>";
                echo "temporadas: "    . htmlspecialchars($serie["temporadas"]);
                echo "valoracion: "    . htmlspecialchars($serie["valoracion"]);
                echo "terminado: "    . htmlspecialchars($serie["terminado"]);
                //imagenen

                echo "</p>";
            }
        }
    }
} else {
    echo "<p>No se ha realizado ninguna búsqueda.</p>";
}
?>