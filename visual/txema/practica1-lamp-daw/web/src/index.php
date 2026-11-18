<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Despliegue LAMP - 2o DAW</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f6f9;
        }

        h1 {
            color: #1F497D;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2F5496;
            color: white;
        }
    </style>
</head>

<body>
    <h1>¡Conexión Exitosa con Docker Compose!</h1>
    <p>Módulo de Despliegue de Aplicaciones Web (2o DAW)</p>
    <?php
    $host = getenv('DB_HOST');
    $dbname = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = trim(file_get_contents('/run/secrets/db_password'));
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->query("SELECT * FROM productos");
        echo "<table><tr><th>ID</th><th>Producto</th><th>Precio</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['precio']} €</td></tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Error de conexión: " . $e->getMessage() . "</p>";
    }
    ?>
</body>

</html>