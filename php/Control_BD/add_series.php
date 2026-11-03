<?php

// ============================================================
// ANTES: se usaba session_start() y las series se guardaban
// en la sesión usando el array de includes/datuak.php.
// AHORA: nos conectamos a la base de datos.
// La serie nueva se guarda directamente en la tabla "serieak".
// ============================================================

// Cargamos el archivo de funciones donde está declarada serieaGehitu() y serieaLortu()
require_once "includes/funtzioak.php";

// Cargamos el archivo que crea la variable de conexión $conn a la base de datos MySQL
require_once "includes/konexioa.php";

// Incluimos la cabecera HTML común del sitio (navegación, estilos CSS, etc.)
include "header.php";

?>

<!-- Título principal de la página -->
<h1>Serie berria gehitu</h1>

<!-- 
    Formulario HTML para enviar los datos de la nueva serie.
    - action="add_series.php": se envía a este mismo archivo para ser procesado por PHP.
    - method="post": los datos viajan ocultos en el cuerpo de la petición HTTP.
-->
<form action="add_series.php" method="post">

    <!-- Campo de texto para el título de la serie -->
    <label for="izenburua">Izenburua:</label>
    <input type="text" id="izenburua" name="izenburua">

    <!-- Menú desplegable para seleccionar el género -->
    <label for="generoa">Generoa:</label>
    <select name="generoa" id="generoa">
        <option value="">Guztiak</option>
        <option value="Zientzia fikzioa">Zientzia fikzioa</option>
        <option value="Drama">Drama</option>
        <option value="Fantasia">Fantasia</option>
        <option value="Thriller">Thriller</option>
    </select>

    <!-- Campo numérico para el número de temporadas (mínimo 1) -->
    <label for="denboraldiak">Denboraldi kopurua:</label>
    <input type="number" id="denboraldiak" name="denboraldiak" min="1">

    <!-- Campo numérico para la valoración de 0 a 10 con decimales (paso de 0.1) -->
    <label for="balorazioa">Balorazioa:</label>
    <input type="number" id="balorazioa" name="balorazioa" min="0" max="10" step="0.1">

    <!-- Menú desplegable para el estado actual de la serie (0 = Martxan, 1 = Amaituta) -->
    <label for="amaituta">Egoera:</label>
    <select id="amaituta" name="amaituta">
        <option value="0">Martxan</option>
        <option value="1">Amaituta</option>
    </select>

    <!-- Botón para enviar el formulario. name="gehitu" sirve para detectar la pulsación en PHP -->
    <button type="submit" name="gehitu">Seriea gehitu</button>

</form>

<?php

// ============================================================
// PROCESAMIENTO DEL FORMULARIO (Se ejecuta solo al hacer clic en Submit)
// ============================================================

// Comprobamos mediante isset() si se ha presionado el botón con name="gehitu"
if (isset($_POST["gehitu"])) {

    // Recogemos las entradas enviadas por el usuario mediante el superarray $_POST
    $izenburua   = $_POST["izenburua"];
    $generoa     = $_POST["generoa"];
    $denboraldiak = $_POST["denboraldiak"];
    $balorazioa  = $_POST["balorazioa"];

    // Convertimos la opción seleccionada ("1" o "0") en un valor booleano (true / false)
    if ($_POST["amaituta"] == 1) {
        $amaituta = true;
    } else {
        $amaituta = false;
    }

    // ANTES: se añadía la serie al array y se guardaba en la sesión.
    // AHORA: llamamos a serieaGehitu() para hacer el INSERT en la base de datos.
    // La función ejecuta la consulta y nos devuelve el ID (clave primaria) recién generado.
    $idBerria = serieaGehitu(
        $conn,
        $izenburua,
        $generoa,
        $denboraldiak,
        $balorazioa,
        $amaituta
    );

    echo "<h2>Serie berria</h2>";

    // ANTES: se recuperaba la última serie del array en sesión.
    // AHORA: hacemos un SELECT WHERE id = $idBerria para obtener la fila recién insertada.
    $serieBerria = serieaLortu($conn, $idBerria);

    // Mostramos la ficha visual de la nueva serie envolviéndola en un array [$serieBerria],
    // ya que la función serieakErakutsi() espera recibir un array de series para iterar.
    serieakErakutsi([$serieBerria]);
}

// Incluimos el pie de página HTML común (cierres de etiquetas </body></html>, etc.)
include "footer.php";

?>