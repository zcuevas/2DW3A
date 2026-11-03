
<?php

// ANTES: se usaba session_start() y las series se cargaban
// del fichero includes/datuak.php y de la sesión.
// AHORA: nos conectamos a la base de datos y leemos las series de la tabla.

// Cargamos las funciones.
require_once "includes/funtzioak.php";

// Cargamos la conexión a la base de datos.
require_once "includes/konexioa.php";

// Leemos todas las series de la base de datos.
$series = serieakLortu($conn);

// Cargamos la cabecera HTML.
include "header.php";

?>

<h1>Serieak</h1>

<?php

// Mostramos todas las series, incluidas las añadidas.
serieakErakutsi($series);

include "footer.php";

?>