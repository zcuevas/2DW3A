<?php

include "datos.php";

// COMPROBAR SI SE HA PULSADO GUARDAR

if (isset($_POST["guardar"])) {

    // RECOGER EL NOMBRE
    $usuario = $_POST["usuario"];

    // GUARDAR EL NOMBRE EN LA SESIÓN
    // Ahora podemos utilizar este nombre en otras páginas.

    $_SESSION["usuario"] = $usuario;

    //MOSTRAR EL NOMBRE
    echo "Usuario guardado: " . $_SESSION["usuario"];

}

?>