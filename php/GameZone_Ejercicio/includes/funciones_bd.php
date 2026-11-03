<?php
// TODO 4: obtenerVideojuegos($conexion)
// SELECT * FROM videojuegos ORDER BY nombre
// Devuelve el resultado de la consulta.

function obtenerVideojuegos($conexion) {
    // Consulta SQL para obtener los videojuegos ordenados alfabéticamente
    $sql = "SELECT * FROM videojuegos ORDER BY nombre";

    // Prepara la consulta en la base de datos
    $stmt = $conexion->prepare($sql);

    // Ejecuta la consulta
    $stmt->execute();

    // Obtiene el conjunto de resultados de la consulta
    $resultado = $stmt->get_result();

    // Libera la memoria de la consulta
    $stmt->close();

    // Devuelve el objeto con todos los datos
    return $resultado;
}

// TODO 5: insertarVideojuego($conexion,$nombre,$genero,$plataforma,$precio,$stock)
// INSERT con 5 signos ? y sentencia preparada.
// Tipos bind_param: "sssdi". Devuelve true/false.

function insertarVideojuego($conexion, $nombre, $genero, $plataforma, $precio, $stock)
{
    // Consulta SQL con '?' como marcadores para evitar inyección SQL
    $sql = "INSERT INTO videojuegos (nombre, genero, plataforma, precio, stock)
            VALUES (?, ?, ?, ?, ?)";

    // Prepara la consulta en la base de datos
    $stmt = $conexion->prepare($sql);

    // Asocia las variables a los '?' (s = texto, d = decimal, i = entero)
    $stmt->bind_param("sssdi", $nombre, $genero, $plataforma, $precio, $stock);

    // Ejecuta la inserción y guarda el resultado (true si va bien, false si falla)
    $resultado = $stmt->execute();

    // Libera la memoria de la consulta
    $stmt->close();

    // Devuelve true o false
    return $resultado;
}

