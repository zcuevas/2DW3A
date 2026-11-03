
<?php

// ANTES: se usaba session_start() y las series se
// cargaban de includes/datuak.php y de la sesión.
// AHORA: nos conectamos a la base de datos y leemos las series de la tabla.

// Cargamos las funciones.
require_once "includes/funtzioak.php";

// Cargamos la conexión a la base de datos.
require_once "includes/konexioa.php";

// Leemos todas las series de la base de datos.
$series = serieakLortu($conn);

include "header.php";

?>

<h1>Serieak bilatu</h1>

<form action="search.php" method="post">

    <label for="bilaketa">Seriearen izenburua:</label>

    <input
        type="text"
        id="bilaketa"
        name="bilaketa"
        required
    >

    <button type="submit" name="bilatu">Bilatu</button>

</form>

<?php

// Comprobamos si se ha enviado el formulario de búsqueda.
if (isset($_POST["bilatu"])) {

    // Recogemos el texto que queremos buscar.
    $testua = $_POST["bilaketa"];

    // ANTES: se buscaba en las series de la sesión.
    // AHORA: se busca en las series que hemos leído de la base de datos.
    // Esto incluye las series añadidas por el usuario.
    $emaitzak = serieakBilatu($series, $testua);

    if (count($emaitzak) > 0) {

        echo "<h2>Bilaketaren emaitzak</h2>";

        serieakErakutsi($emaitzak);

    } else {

        echo "<p>Ez da serierik aurkitu.</p>";
    }
}

include "footer.php";

?>
