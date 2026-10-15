<?php

// ---------------------------------------------------------
// COMPROBAMOS SI EXISTE LA COOKIE "libros"
// ---------------------------------------------------------

// isset() sirve para comprobar si una variable existe.
// En este caso comprobamos si existe la cookie "libros".
if (isset($_COOKIE["libros"])) {

    // La cookie guarda los datos como texto JSON.
    // json_decode() convierte ese texto otra vez en un array.
    //
    // El segundo parámetro "true" hace que obtengamos
    // un array asociativo de PHP.
    $libros = json_decode($_COOKIE["libros"], true);
} else {

    // Si todavía no existe la cookie,
    // creamos un array vacío.
    //
    // [] significa "array vacío".
    $libros = [];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!--Indicamos que usamos caracteres como á, é, ñ, etc.-->
    <meta charset="UTF-8">

    <!--Título que aparece en la pestaña del navegador -->
    <title>Biblioteca</title>

</head>

<body>

    <!--Título principal de nuestra página-->
    <h1>Mi biblioteca</h1>

    <!--Enlace para ir a la página donde añadiremos libros. href indica a qué página queremos ir.-->
    <p>
        <a href="visualizar.html">Volver al inicio</a>
        &nbsp;|&nbsp;
        <a href="anadir.php">Añadir libro</a>
        &nbsp;|&nbsp;
        <!--Enlace para ir a la página de búsqueda-->
        <a href="buscar.php">Buscar libro</a>
    </p>
    <?php

    // Comprobamos si hay al menos un libro.
    if (count($libros) >= 1) {

    ?>

        <p>
            Hay <?php echo count($libros); ?>

            <?php
            // Si hay exactamente 1 libro, escribimos "libro".
            // Si hay cualquier otra cantidad, escribimos "libros".
            echo (count($libros) == 1) ? "libro" : "libros";
            ?>

            en la lista.
        </p>

    <?php

    }

    ?>

    <hr />

    <h2>Lista de libros</h2>

    <?php

    // ---------------------------------------------------------
    // COMPROBAMOS SI HAY LIBROS
    // ---------------------------------------------------------

    // count() cuenta cuántos elementos tiene un array.
    if (count($libros) == 0) {

        // Si hay 0 libros mostramos este mensaje.
        echo "<p>No hay libros en la biblioteca.</p>";
    } else {

        // -----------------------------------------------------
        // MOSTRAMOS TODOS LOS LIBROS
        // -----------------------------------------------------

        // foreach sirve para recorrer un array elemento por elemento.
        foreach ($libros as $libro) {

            // Mostramos el título.
            echo "<h3>" . $libro["titulo"] . "</h3>";

            // Mostramos el autor.
            echo "<p>Autor: " . $libro["autor"] . "</p>";

            // Mostramos el año.
            echo "<p>Año: " . $libro["anio"] . "</p>";

            // Mostramos la imagen del libro.
            echo "<img src='" . $libro["imagen"] . "' width='10%'; hight='10%'>";

            // Una línea para separar los libros.
            echo "<hr>";
        }
    }

    ?>

</body>

</html>