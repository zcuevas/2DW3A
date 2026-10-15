<?php

// Este archivo NO se abre directamente en el navegador.
// Se incluye (include) al principio de todos los demás archivos
// para que todos "compartan" el mismo array de libros.

// session_start() TIENE que ir antes de cualquier salida (echo, HTML, etc).
// Como este archivo no imprime nada, es el sitio perfecto para ponerlo.
session_start();

// isset() comprueba si esa clave de sesión ya existe.
// La primera vez que se ejecute cualquier archivo del examen, no existirá,
// así que se crea aquí con los datos de ejemplo.
// Las siguientes veces, isset() será true y NO se sobreescribirá
// (así no perdemos los libros que el usuario haya añadido).
if (!isset($_SESSION['libros'])) {

    // Array de arrays asociativos: cada libro es un array con sus propias claves.
    $_SESSION['libros'] = [
        ["Titulo" => "Mago pop", "Autor" => "Epstein", "Año" => 2000, "Imagen" => "magopop.png"],
        ["Titulo" => "Harry Potter", "Autor" => "Juan", "Año" => 1980, "Imagen" => "harryPotter.png"],
        ["Titulo" => "El Señor de los Anillos", "Autor" => "Pablo", "Año" => 1954, "Imagen" => "elSeñorDeLosAnillos.png"],
        ["Titulo" => "El Hobbit", "Autor" => "Jose", "Año" => 1937, "Imagen" => "elHobbit.png"],
    ];
}

// A partir de aquí, en CUALQUIER archivo que haga include 'datos.php',
// puedes usar $_SESSION['libros'] como si fuera una variable normal.
