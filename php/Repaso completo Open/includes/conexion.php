<?php
// Configuración local XAMPP. Cambiar los datos si fuera necesario.
$servidor = 'localhost';
$usuario = 'root';
$contrasena = '';
$baseDatos = 'gameworld';

try {
    $conexion = new mysqli($servidor, $usuario, $contrasena, $baseDatos);
    $conexion->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    die('No se ha podido conectar con la base de datos.');
}
