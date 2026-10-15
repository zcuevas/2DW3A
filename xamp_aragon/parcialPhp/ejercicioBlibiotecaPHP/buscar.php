<?php

// ---------------------------------------------------------
// COMPROBAMOS SI EL USUARIO HA BUSCADO ALGO
// ---------------------------------------------------------

// isset() comprueba si existe "buscar" dentro de $_GET.
if (isset($_GET["buscar"])) {

    // Guardamos lo que ha escrito el usuario.
    $busqueda = $_GET["buscar"];
} else {

    // Si todavía no ha buscado nada,
    // dejamos la variable vacía.
    $busqueda = "";
}


// ---------------------------------------------------------
// RECUPERAMOS LOS LIBROS DE LA COOKIE
// ---------------------------------------------------------

if (isset($_COOKIE["libros"])) {

    // Convertimos el JSON de la cookie en un array.
    $libros = json_decode($_COOKIE["libros"], true);
} else {

    // Si no hay cookie, no hay libros.
    $libros = [];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Buscar libro</title>

</head>

<body>

    <h1>Buscar libro</h1>


    <!--
        FORMULARIO DE BÚSQUEDA

        Utilizamos GET porque estamos haciendo una búsqueda.
        El resultado aparecerá en la URL.
    -->

    <form action="buscar.php" method="GET">

        <!--El name="buscar" es importante porque después podremos utilizar $_GET["buscar"-->

        <input
            type="text"
            name="buscar"
            placeholder="Buscar libro...">

        <!-- Botón para enviar la búsqueda -->
        <input type="submit" value="🔍 Buscar">

    </form>

    <hr>


    <?php

    // ---------------------------------------------------------
    // HACEMOS LA BÚSQUEDA
    // ---------------------------------------------------------

    // Solo buscamos si el usuario ha escrito algo.
    if ($busqueda != "") {

        // Esta variable nos servirá para saber
        // si hemos encontrado algún libro.
        $encontrado = false;


        // Recorremos todos los libros.
        foreach ($libros as $libro) {

            // -------------------------------------------------
            // BUSCAMOS EN EL TÍTULO
            // -------------------------------------------------

            // stripos() busca un texto dentro de otro texto.
            //
            // Por ejemplo:
            //
            // stripos("El principito", "principito")
            //
            // encontrará "principito".
            //
            // El !== false significa que sí hemos encontrado
            // el texto.
            if (stripos($libro["titulo"], $busqueda) !== false) {

                // Hemos encontrado un libro.
                $encontrado = true;

                // Mostramos sus datos.
                echo "<h2>Resultado:</h2>";

                echo "<p>Título: " . $libro["titulo"] . "</p>";

                echo "<p>Autor: " . $libro["autor"] . "</p>";

                echo "<p>Año: " . $libro["anio"] . "</p>";

                echo "<hr>";
            }
        }


        // -----------------------------------------------------
        // SI NO ENCONTRAMOS NADA
        // -----------------------------------------------------

        if ($encontrado == false) {

            echo "<p>No se ha encontrado ningún libro.</p>";
        }
    }

    ?>


    <!-- Volver a la biblioteca -->

    <a href="index.php">Volver a la biblioteca</a>

</body>

</html>