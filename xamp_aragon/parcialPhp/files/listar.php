<?php


include "datos.php";


// COMPROBAR Y RECORRER LA MATRIZ

// Comprobamos que exista la lista de libros
// y que no esté vacía.
if (isset($_SESSION["libros"]) && !empty($_SESSION["libros"])) {

    // Recorremos todos los libros de la matriz.
    // $libro representa cada libro uno por uno.
    foreach ($_SESSION["libros"] as $libro) {

        // Empezamos a mostrar la información del libro.
        echo "<p>";

        // Mostramos el título del libro.
        echo "Título: " . htmlspecialchars($libro["Titulo"]) . "<br>";

        // Mostramos el autor del libro.
        echo "Autor: " . htmlspecialchars($libro["Autor"]) . "<br>";

        // Mostramos el año del libro.
        echo "Año: " . htmlspecialchars($libro["Año"]) . "<br>";

        echo "</p>";
    }

} else {

    // Si no hay libros en la sesión,
    // mostramos este mensaje.
    echo "<p>No hay libros disponibles.</p>";
}

?>