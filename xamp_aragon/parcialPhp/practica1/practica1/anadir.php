<?php include "libreria.php"; ?>
<html>
<head>
    <title>Añadir libro</title>
</head>
<body>

<h1>Añadir libro</h1>
<?php
// si han dado a enviar, recojo los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
// recojo los datos del formulario, trim quita espacios al principio y al final 
// el ?? "" es para que no de error si no existe la variable
    $titulo = trim($_POST["titulo"] ?? "");
    $autor  = trim($_POST["autor"] ?? "");
    $anyo   = trim($_POST["anyo"] ?? "");

    if ($titulo == "" || $autor == "" || $anyo == "") {
        echo "<p>ERROR: hay que rellenar los tres campos.</p>";
    } else {
        anadir_libro($titulo, $autor, $anyo);
        echo "<p>Libro añadido: " . $titulo . " - " . $autor . " (" . $anyo . ")</p>";
    }
}
?>
<!-- Formulario para añadir libros -->
<form action="" method="post"> 
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo"><br><br>

    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor"><br><br>

    <label for="anyo">Año:</label>
    <!-- type number para que salga la flechita de subir y bajar -->
    <input type="number" id="anyo" name="anyo" min="0" max="2100"><br><br>

    <input type="submit" value="Enviar">
</form>

<hr>
<a href="index.html">Volver al inicio</a> |
<a href="visualizar.php">Ver todos los libros</a>

</body>
</html>
