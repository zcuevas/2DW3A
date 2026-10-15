<?php
// Este fichero es la "base de datos" de la biblioteca.
// No muestra nada, solo guarda los libros. Los demás lo incluyen con include.
// la sesión me sirve para que los libros que añada no se borren al recargar
session_start();
// matriz = cada libro es un array con sus 3 datos
if (!isset($_SESSION["libros"])) {
    $_SESSION["libros"] = array(
        array("titulo" => "El Quijote",        "autor" => "Miguel de Cervantes", "anyo" => 1605),
        array("titulo" => "Cien años de soledad", "autor" => "Gabriel García Márquez", "anyo" => 1967),
        array("titulo" => "1984",              "autor" => "George Orwell",      "anyo" => 1949),
        array("titulo" => "El Hobbit",         "autor" => "Tolkien",     "anyo" => 1937),
        array("titulo" => "Fahrenheit 451",    "autor" => "Ray Bradbury",       "anyo" => 1953)
    );
}
// con esto los demás ficheros trabajan con $libros y no con el $_SESSION
$libros = $_SESSION["libros"];

// mete un libro nuevo en la lista
function anadir_libro($titulo, $autor, $anyo) {

    $_SESSION["libros"][] = array(
        "titulo" => $titulo,
        "autor"  => $autor,
        "anyo"   => $anyo
    );
}

// devuelve un array con los libros que coinciden con lo buscado
function buscar_libros($texto) { 

    $encontrados = array();

    foreach ($_SESSION["libros"] as $libro) {
        // stripos busca dentro del texto sin distinguir mayúsculas, devuelve false si no lo encuentra
        if (stripos($libro["titulo"], $texto) !== false || stripos($libro["autor"], $texto) !== false) { // si coincide el título o el autor
            $encontrados[] = $libro; // lo añado a la lista de encontrados
        }
    }
    return $encontrados; // devuelvo la lista de encontrados
}
?>