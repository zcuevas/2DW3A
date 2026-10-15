<?php
include "datos.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir series</title>
</head>
<body>

    <h1>Añadir series</h1>
<?php
// Si han dado a enviar, recojo los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Recojo los datos del formulario, trim quita espacios al principio y al final 
    // El ?? "" es para que no dé error si no existe la variable
    $titulo = trim($_POST["titulo"] ?? "");
    $genero  = trim($_POST["genero"] ?? "");
    $temporadas   = trim($_POST["temporadas"] ?? "");
    $valoracion   = trim($_POST["valoracion"] ?? "");

    if ($titulo == "" || $genero == "" || $temporadas == "" || $valoracion == "" ) {
        echo "<p>ERROR: hay que rellenar los cuatro campos.</p>";
    } else {
        anadir_serie($titulo, $genero, $temporadas, $valoracion );
        echo "<p>serie añadido: " . htmlspecialchars($titulo) . " - " . htmlspecialchars($genero) . " (" . htmlspecialchars($temporadas) . ") . (" . htmlspecialchars($valoracion) . "</p>";
    }
} else {
    echo "<p>No se han recibido datos por el método POST.</p>";
}
?>

    <hr>
    <a href="txantiloia_home.html">Hasiera</a>
    <a href="bilatu.html">Bilatu</a>
    <a href="anadir.php">Seriea gehitu</a>
    <a href="#">Estatistikak</a>

</body>
</html>