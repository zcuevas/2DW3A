<?php

// ---------------------------------------------------------
// PRIMERO COMPROBAMOS SI SE HA ENVIADO EL FORMULARIO
// ---------------------------------------------------------

// $_SERVER["REQUEST_METHOD"] nos dice cómo se ha enviado
// la página.
//
// Si el formulario utiliza method="POST", aquí tendremos "POST".
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // -----------------------------------------------------
    // RECOGEMOS LOS DATOS DEL FORMULARIO
    // -----------------------------------------------------

    // $_POST["titulo"] recoge lo que el usuario escribió
    // en el input cuyo name es "titulo".
    $titulo = $_POST["titulo"];

    // Recogemos el autor.
    $autor = $_POST["autor"];

    // Recogemos el año.
    $anio = $_POST["anio"];

    // $_FILES contiene los archivos que se han enviado
    // mediante el formulario.
    $imagen = $_FILES["imagen"];

    // ---------------------------------------------------------
    // GUARDAR LA IMAGEN
    // ---------------------------------------------------------

    // Obtenemos el nombre original de la imagen.
    $nombreImagen = $imagen["name"];

    // Creamos la ruta donde queremos guardar la imagen.
    $rutaImagen = "imagenes/" . $nombreImagen;

    // Movemos la imagen desde su ubicación temporal
    // hasta nuestra carpeta "imagenes".
    move_uploaded_file($imagen["tmp_name"],$rutaImagen);

    // -----------------------------------------------------
    // COMPROBAMOS SI YA EXISTEN LIBROS EN LA COOKIE
    // -----------------------------------------------------

    if (isset($_COOKIE["libros"])) {

        // Si existe la cookie, convertimos el JSON
        // almacenado en ella a un array de PHP.
        $libros = json_decode($_COOKIE["libros"], true);
    } else {

        // Si no existe todavía, creamos un array vacío.
        $libros = [];
    }

    // -----------------------------------------------------
    // CREAMOS EL NUEVO LIBRO
    // -----------------------------------------------------

    // Creamos un array con los datos del libro.
    $nuevoLibro = [

        // Guardamos el título.
        "titulo" => $titulo,

        // Guardamos el autor.
        "autor" => $autor,

        // Guardamos el año.
        "anio" => $anio,

        // De momento dejamos la imagen vacía.
        "imagen" => $rutaImagen

    ];

    // -----------------------------------------------------
    // AÑADIMOS EL LIBRO AL ARRAY
    // -----------------------------------------------------

    // [] significa que añadimos un nuevo elemento
    // al final del array.
    $libros[] = $nuevoLibro;

    // -----------------------------------------------------
    // GUARDAMOS EL ARRAY EN UNA COOKIE
    // -----------------------------------------------------

    // Una cookie no puede guardar directamente un array.
    //
    // Por eso utilizamos json_encode().
    //
    // json_encode() convierte nuestro array en texto JSON.
    $datosCookie = json_encode($libros);

    // Creamos/actualizamos la cookie.
    //
    // time() obtiene el momento actual.
    //
    // + 60 * 60 significa que la cookie durará 1 día.
    setcookie("libros", $datosCookie, time() + 60 * 60 * 24);
    // prueba con 30s
    setcookie("libros", $datosCookie, time() + 30);

    // -----------------------------------------------------
    // MOSTRAMOS UN MENSAJE
    // -----------------------------------------------------

    echo "<p>Libro añadido correctamente.</p>";

    // Creamos un enlace para volver a la biblioteca.
    echo "<a href='index.php'>Volver a la biblioteca</a>";

    // Terminamos el PHP aquí.
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!--Permite utilizar ñ, tildes, etc-->
    <meta charset="UTF-8">

    <title>Añadir libro</title>

</head>

<body>

    <h1>Añadir libro</h1>

    <!--Volver a la página principal-->
    <a href="visualizar.html">Volver al inicio</a>
    &nbsp;|&nbsp;
    <!--Enlace para ver los libros. href="index.php" significa que cuando hagamos clic, iremos a index.php-->
    <a href="index.php">Ver libros</a>
    <br /><br /><br />

    <!--FORMULARIO

        action="anadir.php"
        significa que los datos se enviarán a anadir.php.

        method="POST"
        significa que utilizaremos $_POST para recoger los datos-->

    <form action="anadir.php" method="POST" enctype="multipart/form-data">

        <!--CAMPO DEL TÍTULO-->

        <label>Título:</label>

        <!--type="text" crea una caja para escribir texto.

            name="titulo" es MUY IMPORTANTE porque PHP
            utilizará $_POST["titulo"]-->
        <input type="text" name="titulo">

        <br><br>


        <!--CAMPO DEL AUTOR-->

        <label>Autor:</label>

        <input type="text" name="autor">

        <br><br>


        <!--CAMPO DEL AÑO-->

        <label>Año:</label>

        <!--type="number" permite introducir números-->
        <input type="number" name="anio">

        <br><br>


        <!--CAMPO DE IMAGEN-->

        <label>Imagen:</label>

        <!--type="file" crea un botón para seleccionar un archivo del ordenador-->
        <input type="file" name="imagen">

        <br><br>


        <!--BOTÓN DE ENVIAR-->
        <input type="submit" value="Añadir">

    </form>

</body>

</html>