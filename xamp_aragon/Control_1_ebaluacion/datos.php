<?php
session_start();

if (!isset($_SESSION["series"])) {
    $_SESSION["series"] = array(
        array("titulo" => "Stranger Things", "genero" => "Zientzia fikzioa", "temporadas" => 5, "valoracion" => 8.7, "terminado" => false, "imagen" => "img/stranger-things.jpg"),
        array("ttitulo" => "Breaking Bad", "genero" => "Drama", "temporadas" => 5, "valoracion" => 9.5, "terminado" => true, "imagen" => "img/breaking-bad.jpg"),
        array("titulo" => "Dark", "genero" => "Zientzia fikzioa",  "temporadas" => 3,  "valoracion" => 8.7,  "terminado" => true,  "imagen" => "img/dark.jpg"),
        array("titulo" => "Wednesday", "genero" => "Fantasia", "temporadas" => 2, "valoracion" => 8.0, "terminado" => false, "imagen" => "img/wednesday.jpg"),
        array("titulo" => "The Last of Us", "genero" => "Drama", "temporadas" => 2, "valoracion" => 8.7, "terminado" => false, "imagen" => "img/the-last-of-us.jpg"),
        array("titulo" => "La casa de papel",  "genero" => "Thriller",  "temporadas" => 5,  "valoracion" => 8.2, "terminado" => true, "imagen" => "img/la-casa-de-papel.jpg"  ),
        array("titulo" => "Black Mirror", "genero" => "Zientzia fikzioa", "temporadas" => 7,  "valoracion" => 8.7,  "terminado" => false,  "imagen" => "img/black-mirror.jpg"),
        array("titulo" => "Peaky Blinders", "genero" => "Drama", "temporadas" => 6, "valoracion" => 8.8,  "terminado" => true,  "imagen" => "img/peaky-blinders.jpg")
    );
}
$series = $_SESSION["series"];

function anadir_serie($titulo, $genero, $temporadas, $valoracion , $terminado, $imagen) {

    $_SESSION["series"][] = array(
        "titulo" => $titulo,
        "genero"  => $genero,
        "temporadas" => $temporadas,
        "valoracion" => $valoracion,
        "terminado" => $terminado,
        "imagen" => $imagen
    );
}

// devuelve un array con las series que coinciden con lo buscado
function buscar_series($texto) { 

    $encontrados = array();

    foreach ($_SESSION["series"] as $serie) {
        // stripos busca dentro del texto sin distinguir mayúsculas, devuelve false si no lo encuentra
        if (stripos($serie["titulo"], $texto) !== false) { // si coincide el título 
            $encontrados[] = $serie; // lo añado a la lista de encontrados
        }
    }
    return $encontrados; // devuelvo la lista de encontrados
}
?>