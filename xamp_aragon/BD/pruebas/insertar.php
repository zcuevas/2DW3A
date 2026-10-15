<?php
//variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda";
try {
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    // Insertamos registros en la tabla
    // Preparamos la sentencia
    $miInsert = $conexion->prepare("INSERT INTO contactos (nombre, apellido, email, telefono, detalle) 
    VALUES (:nombre, :apellido, :email, :telefono, :detalle)");
    // Ejecuta INSERT con los valores
    $miInsert->execute(
        array(
            ':nombre' => 'Juan',
            ':apellido' => 'Pérez',
            ':email' => 'juan.perez@example.com',
            ':telefono' => '1234567890',
            ':detalle' => 'Detalle del contacto'
        )
    );
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}   
?>  