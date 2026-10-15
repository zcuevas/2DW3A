<?php include "libreria.php"; // incluyo la librería ?>
<html>
<head>
    <title>Buscar libro</title>
</head>
<body>

<h1>Buscar libro</h1>
<!-- Formulario para buscar libros -->
<form action="" method="post">
    <input type="text" name="busqueda" placeholder="Título o autor">
    <input type="submit" value="Enviar">
</form>

<?php
// si han dado a enviar, para que no pase al abrir
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $busqueda = trim($_POST["busqueda"] ?? ""); 

    if ($busqueda == "") {
        echo "<p>Escribe algo para buscar.</p>";

    } else {
        // la función está en libreria.php
        $resultados = buscar_libros($busqueda);

        if (count($resultados) == 0) {
            echo "<p>No se encontró ningún libro con \"" . $busqueda . "\".</p>";

        } else {
            echo "<h2>Resultados (" . count($resultados) . "):</h2>";

            foreach ($resultados as $libro) {
                echo "<p>";
                echo "Título: " . $libro["titulo"] . "<br>";
                echo "Autor: "  . $libro["autor"]  . "<br>";
                echo "Año: "    . $libro["anyo"];
                echo "</p>";
            }
        }
    }
}
?>

<hr>
<a href="index.html">Volver al inicio</a> |
<a href="visualizar.php">Ver todos los libros</a>

</body>
</html>
