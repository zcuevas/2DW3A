<?php
// INCLUIR DATOS.PHP
// Aquí NO ponemos session_start().
// ¿Por qué?
// Porque datos.php ya tiene session_start();
// Al hacer include, también se ejecuta.
// Así evitamos iniciar la sesión dos veces.

include "datos.php";
// COMPROBAR SI SE HA PULSADO EL BOTÓN
// En nuestro HTML tenemos name="enviar"
// Por eso aquí podemos comprobar $_POST["enviar"]
// isset() significa:
// "¿Existe este dato?"

if (isset($_POST["enviar"])) {

    // RECOGER LOS DATOS DEL FORMULARIO
    // Por eso aquí utilizamos exactamente los mismos nombres.
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $anio = $_POST["anio"];
    $imagen = $_POST["imagen"];

    // CREAR EL NUEVO LIBRO
    // Creamos un array con la misma estructura
    // que tienen los libros de datos.php.

    $nuevoLibro = [
        "Titulo" => $titulo,
        "Autor" => $autor,
        "Año" => $anio,
        "Imagen" => $imagen
    ];

    // AÑADIR EL LIBRO A LA SESIÓN
    // $_SESSION["libros"] contiene todos nuestros libros.
    // [] significa:
    // "añade este nuevo elemento al final"

    $_SESSION["libros"][] = $nuevoLibro;
    // MOSTRAR UN MENSAJE
  
    echo "Libro añadido correctamente.";

}

?>