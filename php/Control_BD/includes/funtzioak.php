<?php
// ============================================================
// ANTES: las series se cargaban del array de includes/datuak.php
// y se guardaban en la sesion.
// AHORA: las series se leen de la tabla "serieak" de la base de datos.
// Esta funcion devuelve un array igual que antes, para que todas
// las demas funciones sigan funcionando sin cambios.
// ============================================================
function serieakLortu($conn) {

    // Hacemos la consulta SQL: solicitamos todos los registros de la tabla "serieak"
    $resultado = mysqli_query($conn, "SELECT * FROM serieak");

    // Preparamos un array vacío para ir guardando los datos procesados
    $series = [];

    // Recorremos fila por fila el resultado de la base de datos
    // mysqli_fetch_assoc convierte cada fila en un array asociativo
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $series[] = $fila; // Añadimos la fila obtenida al array $series
    }

    // Devolvemos el array completo cargado con las series de la base de datos
    return $series;
}


// ============================================================
// ANTES: esta funcion no existia.
// AHORA: busca UNA sola serie por su id en la base de datos.
// ============================================================
function serieaLortu($conn, $id) {

    // Ejecutamos la consulta filtrando de forma directa por la clave primaria (id)
    $resultado = mysqli_query($conn, "SELECT * FROM serieak WHERE id = $id");

    // Retornamos directamente la única fila coincidente como un array asociativo
    return mysqli_fetch_assoc($resultado);
}


// ============================================================
// Muestra por pantalla el catálogo completo de series en HTML.
// Recibe como parámetro el array asociativo multidimensional $series.
// ============================================================
function serieakErakutsi($series) {

    // Abrimos el contenedor principal de la lista
    echo '<section class="serieak">';

    // Recorremos el array de series elemento por elemento
    foreach ($series as $serie) {

        echo '<article class="seriea">';

        // Comprobamos si la clave "irudia" tiene un valor asignado
        if (isset($serie["irudia"])) {
            echo '<img src="' . $serie["irudia"] . '">'; // Muestra la imagen de la serie
        } else {
            echo '<img src="img/default.jpg">'; // Si no existe, asigna una imagen por defecto
        }

        // Imprimimos la información descriptiva de la serie
        echo '<div>';
        echo '<h2>' . $serie["izenburua"] . '</h2>';
        echo '<p>' . $serie["generoa"] . '</p>';
        echo '<p>' . $serie["denboraldiak"] . ' denboraldi</p>';
        echo '<p>Balorazioa: ' . $serie["balorazioa"] . '</p>';

        // Evaluamos el estado de la serie mediante un booleano
        if ($serie["amaituta"]) {
            echo '<p>Amaituta</p>'; // Finalizada
        } else {
            echo '<p>Martxan</p>';   // En emisión
        }

        echo '</div>';
        echo '</article>';
    }

    // Cerramos el contenedor HTML
    echo '</section>';
}


// ============================================================
// Busca series cuyo título contenga una cadena de texto específica.
// Recibe el array $series y el texto a buscar $testua.
// ============================================================
function serieakBilatu($series, $testua) {

    $emaitzak = []; // Array donde se guardarán las coincidencias encontradas

    // Recorremos el listado completo de series
    foreach ($series as $serie) {
        // stripos busca la posición del texto sin diferenciar mayúsculas y minúsculas
        if (stripos($serie["izenburua"], $testua) !== false) {
            $emaitzak[] = $serie; // Si coincide, añadimos la serie al array de resultados
        }
    }

    return $emaitzak; // Retorna el array con los resultados que cumplen el filtro
}


// ============================================================
// ANTES: esta funcion añadia la serie a un array y devolvia el array.
// AHORA: guarda la serie en la base de datos y devuelve su id.
// ============================================================
function serieaGehitu($conn, $izenburua, $generoa, $denboraldiak, $balorazioa, $amaituta) {

    // En la base de datos MySQL guardamos booleans como 1 (true) o 0 (false)
    if ($amaituta) {
        $amaitutaBD = 1;
    } else {
        $amaitutaBD = 0;
    }

    // Preparamos la sentencia SQL INSERT con todos los datos recibidos
    $sql = "INSERT INTO serieak (izenburua, generoa, denboraldiak, balorazioa, amaituta, irudia)
            VALUES ('$izenburua', '$generoa', '$denboraldiak', '$balorazioa', $amaitutaBD, 'img/default.jpg')";

    // Ejecutamos la consulta en la base de datos
    mysqli_query($conn, $sql);

    // Devolvemos el ID generado dinámicamente por la base de datos para este registro
    return mysqli_insert_id($conn);
}


// ============================================================
// Cuenta cuántas series están actualmente en emisión (martxan / no finalizadas).
// ============================================================
function martxanKalkulatu($series) {

    $kopurua = 0; // Inicializamos un contador a 0

    foreach ($series as $serie) {

        // Evaluamos si el campo "amaituta" es false/0 (usando el operador de negación !)
        if (!$serie["amaituta"]) {
            $kopurua++; // Incrementamos el contador en 1 por cada serie activa
        }
    }

    return $kopurua; // Devolvemos el total
}


// ============================================================
// Calcula la valoración media de todas las series.
// ============================================================
function batezbestekoaKalkulatu($series) {

    $guztira = 0; // Variable acumuladora para la suma total de valoraciones

    // Sumamos la valoración de cada serie
    foreach ($series as $serie) {
        $guztira += $serie["balorazioa"];
    }

    // Dividimos la suma total entre el número total de series obtenido con count()
    return $guztira / count($series);
}


// ============================================================
// Encuentra e identifica la serie que tiene la valoración más alta.
// ============================================================
function balorazioAltuena($series) {

    // Asumimos de inicio que la primera serie ($series[0]) es la de mayor valoración
    $serieAltuena = $series[0];

    // Recorremos todo el array para comparar las valoraciones
    foreach ($series as $serie) {

        // Si encontramos una serie con una valoración superior a la guardada, actualizamos
        if ($serie["balorazioa"] > $serieAltuena["balorazioa"]) {
            $serieAltuena = $serie;
        }
    }

    // Devolvemos el array asociativo con los datos de la serie con mayor puntuación
    return $serieAltuena;
}

?>