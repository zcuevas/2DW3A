<?php

include "datos.php";


// Comprobamos si hemos recibido una búsqueda
if (isset($_POST["buscar"])) {

    // Guardamos el título que ha escrito el usuario
    $busqueda = $_POST["buscar"];

    // Al principio suponemos que no hemos encontrado nada
    $encontrado = false;

    // Recorremos todos los libros guardados en la sesión
    foreach ($_SESSION["libros"] as $libro) {

        // Comparamos el título buscado con el título del libro
        if (isset($libro["Titulo"]) && $libro["Titulo"] == $busqueda) {

            // Hemos encontrado el libro
            $encontrado = true;

            echo "Título: " . $libro["Titulo"] . "<br>";
            echo "Autor: " . $libro["Autor"] . "<br>";
            echo "Año: " . $libro["Año"] . "<br>";
            echo "Imagen: " . $libro["Imagen"] . "<br><br>";
        }
    }

    // Si no se ha encontrado ningún libro
    if ($encontrado == false) {
        echo "No se ha encontrado el libro.";
    }
}

?>