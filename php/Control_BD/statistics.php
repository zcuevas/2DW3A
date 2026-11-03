
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

// Calculamos las estadísticas con todas las series,
// incluidas las que hemos añadido mediante el formulario.
$serieKopurua = count($series);

// Si la tabla está vacía, evitamos errores al dividir entre 0.
if ($serieKopurua > 0) {
    $amaituGabeak = martxanKalkulatu($series);
    $batezbestekoa = batezbestekoaKalkulatu($series);
    $serieAltuena = balorazioAltuena($series);
} else {
    $amaituGabeak = 0;
    $batezbestekoa = 0;
    $serieAltuena = null;
}

include "header.php";

?>

<h1>Estatistikak</h1>

<section class="estatistikak">

    <article class="estatistika">
        <h2>Serie kopurua</h2>
        <p><?php echo $serieKopurua; ?></p>
    </article>

    <article class="estatistika">
        <h2>Martxan dauden serieak</h2>
        <p><?php echo $amaituGabeak; ?></p>
    </article>

    <article class="estatistika">
        <h2>Batez besteko balorazioa</h2>
        <p><?php echo round($batezbestekoa, 2); ?></p>
    </article>

    <article class="estatistika">
        <h2>Baloraziorik altuena</h2>

        <p>
            <?php
            if ($serieAltuena !== null) {
                echo htmlspecialchars($serieAltuena["izenburua"]);
                echo " - ";
                echo $serieAltuena["balorazioa"];
            } else {
                echo "Ez dago serierik.";
            }
            ?>
        </p>
    </article>

</section>

<?php

include "footer.php";

?>
