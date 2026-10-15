<?php
include "libreria.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando libro</title>
</head>
<body>

    <h1>Añadir libro</h1>

<?php
// Si han dado a enviar, recojo los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Recojo los datos del formulario, trim quita espacios al principio y al final 
    // El ?? "" es para que no dé error si no existe la variable
    $titulo = trim($_POST["titulo"] ?? "");
    $autor  = trim($_POST["autor"] ?? "");
    $anyo   = trim($_POST["anyo"] ?? "");

    if ($titulo == "" || $autor == "" || $anyo == "") {
        echo "<p>ERROR: hay que rellenar los tres campos.</p>";
    } else {
        anadir_libro($titulo, $autor, $anyo);
        echo "<p>Libro añadido: " . htmlspecialchars($titulo) . " - " . htmlspecialchars($autor) . " (" . htmlspecialchars($anyo) . ")</p>";
    }
} else {
    echo "<p>No se han recibido datos por el método POST.</p>";
}
?>

    <hr>
    <a href="formulario.html">Añadir otro libro</a> |
    <a href="index.html">Volver al inicio</a> |
    <a href="visualizar.php">Ver todos los libros</a>

</body>
</html>