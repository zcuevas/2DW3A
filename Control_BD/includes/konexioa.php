<?php

// ============================================================
// ANTES: este archivo no existia.
// AHORA: nos conectamos a la base de datos MySQL.
// ============================================================

// Datos de conexion de Laragon.
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDatos = "tx_series";

// Nos conectamos a la base de datos.
$conn = mysqli_connect($servidor, $usuario, $contrasena, $baseDatos);

// Si no se puede conectar, mostramos un error y paramos.
if (!$conn) {
    die("Error de conexion: " . mysqli_connect_error());
}

?>
