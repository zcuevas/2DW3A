<?php include "libreria.php"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
</head>
<body>

<h1>Biblioteca</h1>
<p>Hay <?php echo count($libros); ?> libros en la lista.</p>

<!-- Tabla para mostrar los libros -->
<table border="1">
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Año</th>
    </tr>

    <?php
    // recorro la matriz y pinto una fila por cada libro
    foreach ($libros as $libro) {
        echo "<tr>";
        echo "<td>" . $libro["titulo"] . "</td>";
        echo "<td>" . $libro["autor"]  . "</td>";
        echo "<td>" . $libro["anyo"]   . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<hr>
<a href="index.html">Volver al inicio</a> |
<a href="anadir.php">Añadir libro</a> |
<a href="buscar.php">Buscar</a>

</body>
</html>
