<?php
// TODO 4: obtenerVideojuegos($conexion)
// SELECT * FROM videojuegos ORDER BY nombre
// Devuelve el resultado de la consulta.
function obtenerVideojuegos($conexion)
{
    $sql = "SELECT * FROM videojuegos ORDER BY nombre";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    $resultado = $stmt->get_result();

    $stmt->close();

    return $resultado;
}
// TODO 5: insertarVideojuego($conexion,$nombre,$genero,$plataforma,$precio,$stock)
// INSERT con 5 signos ? y sentencia preparada.
// Tipos bind_param: "sssdi". Devuelve true/false.

function insertarVideojuego($conexion, $nombre, $genero, $plataforma, $precio, $stock)
{
    $sql = "INSERT INTO videojuegos (nombre, genero, plataforma, precio, stock)
        VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssdi", $nombre, $genero, $plataforma, $precio, $stock);
    $resultado = $stmt->execute();
    $stmt->close();

    return $resultado;
}

