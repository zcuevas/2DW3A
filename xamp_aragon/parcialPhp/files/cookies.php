
<?php
// Este archivo crea una cookie.
// Para crear una cookie, usamos la función setcookie().
// La función setcookie() recibe tres parámetros:
// 1. El nombre de la cookie
// 2. El valor de la cookie
// 3. La fecha de expiración (opcional)
//"usuario"       → nombre de la cookie
//"Juan"          → valor que guardamos
//time() + 3600   → dura 1 hora
setcookie("usuario", "Juan", time() + 3600);

echo "Cookie creada correctamente.";

// LEER LA COOKIE
if (isset($_COOKIE["usuario"])) {

    echo "Usuario: " . $_COOKIE["usuario"];

} else {

    echo "La cookie todavía no está disponible. Recarga la página.";
}

?>
