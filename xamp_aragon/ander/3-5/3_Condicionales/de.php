
<?php
// ======================================================
// EJERCICIO 3: ESTRUCTURAS DE CONTROL EN PHP
// ======================================================

// DATOS INICIALES
// Cada videojuego es un array asociativo.
// Todos los videojuegos se almacenan en un array indexado.

$videojuegos = [
    [
        "titulo" => "Minecraft",
        "genero" => "Aventura",
        "plataforma" => "PC",
        "precio" => 29.99,
        "stock" => 8,
        "edadMinima" => 7,
        "edadUsuario" => 15
    ],
    [
        "titulo" => "EA Sports FC 25",
        "genero" => "Deportes",
        "plataforma" => "PS5",
        "precio" => 49.99,
        "stock" => 0,
        "edadMinima" => 3,
        "edadUsuario" => 16
    ],
    [
        "titulo" => "The Legend of Zelda",
        "genero" => "Aventura",
        "plataforma" => "Switch",
        "precio" => 59.99,
        "stock" => 5,
        "edadMinima" => 12,
        "edadUsuario" => 10
    ],
    [
        "titulo" => "Mario Kart 8",
        "genero" => "Carreras",
        "plataforma" => "Switch",
        "precio" => 39.99,
        "stock" => 12,
        "edadMinima" => 3,
        "edadUsuario" => 8
    ],
    [
        "titulo" => "God of War",
        "genero" => "Acción",
        "plataforma" => "PS5",
        "precio" => 44.99,
        "stock" => 0,
        "edadMinima" => 18,
        "edadUsuario" => 20
    ]
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Estructuras de control</title>
</head>

<body>

<h1>Ejercicio 3: Estructuras de control</h1>

<!-- ==================================================
     1. IF, ELSEIF Y ELSE
     ================================================== -->

<h2>1. Condicionales: if, elseif y else</h2>

<?php

// Recorremos todos los videojuegos para comprobar
// el stock, el precio y la edad de cada usuario.

foreach ($videojuegos as $juego) {

    echo "<h3>" . $juego["titulo"] . "</h3>";

    // Comprobamos si hay unidades disponibles.
    if ($juego["stock"] > 0) {
        echo "<p>Stock disponible: " . $juego["stock"] . "</p>";
    } else {
        echo "<p>Agotado</p>";
    }

    // Clasificamos el precio utilizando varios rangos.
    if ($juego["precio"] < 20) {
        echo "<p>Clasificación: Económico</p>";
    } elseif ($juego["precio"] <= 50) {
        echo "<p>Clasificación: Precio medio</p>";
    } else {
        echo "<p>Clasificación: Caro</p>";
    }

    // Comprobamos si el usuario cumple la edad mínima.
    if ($juego["edadUsuario"] >= $juego["edadMinima"]) {
        echo "<p>El usuario cumple la edad mínima.</p>";
    } else {
        echo "<p>El usuario no cumple la edad mínima.</p>";
    }

    // && exige que ambas condiciones sean verdaderas.
    // El usuario debe tener edad suficiente y existir stock.
    if (
        $juego["edadUsuario"] >= $juego["edadMinima"]
        && $juego["stock"] > 0
    ) {
        echo "<p>El usuario puede comprar el videojuego.</p>";
    } else {
        echo "<p>El usuario no puede comprar el videojuego.</p>";
    }
}

?>


<!-- ==================================================
     2. SWITCH
     ================================================== -->

<h2>2. Estructura switch</h2>

<?php

// Recorremos los videojuegos para comprobar su plataforma.
// El switch permite ejecutar diferentes instrucciones dependiendo del valor de una variable.
// En este caso, comprueba el valor de la propiedad "plataforma" del videojuego almacenado en $juego.
// Compara ese valor con cada uno de los case hasta encontrar una coincidencia.
// Cuando encuentra una coincidencia, ejecuta las instrucciones correspondientes.
// El break hace que se salga del switch y no siga comprobando los siguientes casos.
// Si no coincide con ninguno de los case, se ejecuta el bloque default.

foreach ($videojuegos as $juego) {

    echo "<h3>" . $juego["titulo"] . "</h3>";

    switch ($juego["plataforma"]) {

        case "PC":
            echo "<p>Videojuego para ordenador</p>";
            break;

        case "PS5":
            echo "<p>Videojuego para PlayStation 5</p>";
            break;

        case "Xbox":
            echo "<p>Videojuego para Xbox</p>";
            break;

        case "Switch":
            echo "<p>Videojuego para Nintendo Switch</p>";
            break;

        default:
            echo "<p>Plataforma desconocida</p>";
            break;
    }
}

?>


<!-- ==================================================
     3. BUCLE FOR
     ================================================== -->

<h2>3. Bucle for</h2>

<h3>Números del 1 al 10</h3>

<?php

// for tiene tres partes:
// 1. Inicialización: $i = 1.
// 2. Condición: $i <= 10.
// 3. Incremento: $i++.

for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}

?>

<h3>Tabla de precios de Minecraft</h3>

<?php

// Minecraft está almacenado en la posición 0.
// Obtenemos su precio para calcular las cantidades.

$precioMinecraft = $videojuegos[0]["precio"];

?>

<table border="1" cellpadding="8">

    <tr>
        <th>Cantidad</th>
        <th>Precio unitario</th>
        <th>Precio total</th>
    </tr>

    <?php

    // Generamos una fila por cada cantidad.
    // Multiplicamos el precio unitario por la cantidad.

    for ($i = 1; $i <= 10; $i++) {

        $total = $precioMinecraft * $i;

        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>" . number_format($precioMinecraft, 2) . " €</td>";
        echo "<td>" . number_format($total, 2) . " €</td>";
        echo "</tr>";
    }

    ?>

</table>

<h3>Números pares del 2 al 20</h3>

<?php

// Empezamos en 2 y aumentamos de dos en dos.
// De esta manera solo obtenemos números pares.

for ($i = 2; $i <= 20; $i += 2) {
    echo $i . " ";
}

?>


<!-- ==================================================
     4. BUCLE WHILE
     ================================================== -->

<h2>4. Bucle while</h2>

<h3>Simulación de ventas de Minecraft</h3>

<?php

// Copiamos el stock de Minecraft a una variable auxiliar.
// Así no modificamos el array original.

$unidades = $videojuegos[0]["stock"];

// while repite las instrucciones mientras
// la condición indicada sea verdadera.

while ($unidades > 0) {

    // Simulamos la venta de una unidad.
    $unidades--;

    echo "<p>Venta realizada. Quedan $unidades unidades.</p>";
}

// Cuando la condición deja de cumplirse,
// el programa continúa después del bucle.

echo "<p>No quedan videojuegos disponibles.</p>";

?>


<!-- ==================================================
     5. BUCLE FOREACH
     ================================================== -->

<h2>5. Bucle foreach</h2>

<h3>Catálogo de videojuegos</h3>

<table border="1" cellpadding="8">

    <tr>
        <th>Título</th>
        <th>Género</th>
        <th>Plataforma</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Edad mínima</th>
        <th>Edad usuario</th>
        <th>Estado</th>
    </tr>

    <?php

    // foreach recorre cada elemento del array.
    // En cada iteración, $juego contiene un videojuego.

    foreach ($videojuegos as $juego) {

        // Comprobamos si tiene unidades disponibles.
        if ($juego["stock"] > 0) {
            $estado = "Disponible";
        } else {
            $estado = "Agotado";
        }

        // Generamos una fila HTML por videojuego.
        echo "<tr>";
        echo "<td>" . $juego["titulo"] . "</td>";
        echo "<td>" . $juego["genero"] . "</td>";
        echo "<td>" . $juego["plataforma"] . "</td>";
        echo "<td>" . number_format($juego["precio"], 2) . " €</td>";
        echo "<td>" . $juego["stock"] . "</td>";
        echo "<td>" . $juego["edadMinima"] . "</td>";
        echo "<td>" . $juego["edadUsuario"] . "</td>";
        echo "<td>$estado</td>";
        echo "</tr>";
    }

    ?>

</table>


<h3>Videojuegos disponibles</h3>

<ul>

<?php

// Mostramos únicamente los títulos con stock positivo.

foreach ($videojuegos as $juego) {

    if ($juego["stock"] > 0) {
        echo "<li>" . $juego["titulo"] . "</li>";
    }
}

?>

</ul>


<h3>Estadísticas del inventario</h3>

<?php

// Inicializamos el contador de videojuegos agotados.
$agotados = 0;

// Inicializamos el acumulador del valor del inventario.
$valorInventario = 0;

// Tomamos el primer videojuego como referencia
// para encontrar el que tiene mayor stock.
$mayorStock = $videojuegos[0]["stock"];
$tituloMayorStock = $videojuegos[0]["titulo"];

foreach ($videojuegos as $juego) {

    // Contamos los videojuegos que no tienen stock.
    if ($juego["stock"] == 0) {
        $agotados++;
    }

    // Calculamos el valor de todas las unidades.
    // Cada precio se multiplica por su stock.
    $valorInventario += $juego["precio"] * $juego["stock"];

    // Comprobamos si encontramos un stock superior.
    if ($juego["stock"] > $mayorStock) {

        $mayorStock = $juego["stock"];
        $tituloMayorStock = $juego["titulo"];
    }
}

echo "<p>Videojuegos agotados: $agotados</p>";

echo "<p>Valor total del inventario: " .
     number_format($valorInventario, 2) . " €</p>";

echo "<p>Videojuego con mayor stock: $tituloMayorStock</p>";

echo "<p>Unidades disponibles: $mayorStock</p>";

?>


<!-- ==================================================
     6. BREAK Y CONTINUE
     ================================================== -->

<h2>6. Uso de break y continue</h2>

<h3>Videojuegos disponibles utilizando continue</h3>

<ul>

<?php

foreach ($videojuegos as $juego) {

    // continue omite el resto de la iteración actual.
    // Si el videojuego está agotado, pasamos al siguiente.
    if ($juego["stock"] == 0) {
        continue;
    }

    echo "<li>" . $juego["titulo"] . "</li>";
}

?>

</ul>


<h3>Primer videojuego con precio superior a 50 €</h3>

<?php

// Recorremos el array buscando el primer precio > 50.
// break detiene completamente el bucle al encontrarlo.

$encontrado = false;

foreach ($videojuegos as $juego) {

    if ($juego["precio"] > 50) {

        echo "<p>Título: " . $juego["titulo"] . "</p>";

        echo "<p>Precio: " .
             number_format($juego["precio"], 2) . " €</p>";

        $encontrado = true;

        break;
    }
}

// Mostramos un mensaje si ningún juego cumple la condición.
if (!$encontrado) {
    echo "<p>No hay videojuegos de más de 50 €.</p>";
}

?>

</body>
</html>

