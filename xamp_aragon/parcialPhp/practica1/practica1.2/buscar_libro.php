<?php
include "libreria.php"; // Incluyo la librería
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de búsqueda</title>
</head>
<body>

    <h1>Resultados de búsqueda</h1>

<?php
// Si han dado a enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $busqueda = trim($_POST["busqueda"] ?? ""); 

    if ($busqueda == "") {
        echo "<p>Escribe algo para buscar.</p>";
    } else {
        // La función está en libreria.php
        $resultados = buscar_libros($busqueda);

        if (count($resultados) == 0) {
            echo "<p>No se encontró ningún libro con \"" . htmlspecialchars($busqueda) . "\".</p>";
        } else {
            echo "<h2>Resultados (" . count($resultados) . "):</h2>";

            foreach ($resultados as $libro) {
                echo "<p>";
                echo "Título: " . htmlspecialchars($libro["titulo"]) . "<br>";
                echo "Autor: "  . htmlspecialchars($libro["autor"])  . "<br>";
                echo "Año: "    . htmlspecialchars($libro["anyo"]);
                echo "</p>";
            }
        }
    }
} else {
    echo "<p>No se ha realizado ninguna búsqueda.</p>";
}
?>

    <hr>
    <a href="buscar.html">Realizar otra búsqueda</a> |
    <a href="index.html">Volver al inicio</a> |
    <a href="visualizar.php">Ver todos los libros</a>

</body>
</html>