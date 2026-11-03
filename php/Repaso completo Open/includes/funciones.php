<?php
// Funciones generales. Aquí no se escribe ninguna consulta SQL.

// Redirige y detiene el script.
function redirigir($url)
{
    header('Location: ' . $url);
    exit;
}

// Devuelve true si la petición es POST.
function esPost()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

// Comprueba si hay un usuario identificado.
function estaLogueado()
{
    return isset($_SESSION['usuario_id']);
}

// Comprueba si el usuario identificado es administrador.
function esAdmin()
{
    return isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
}

// Obliga a iniciar sesión.
function requiereLogin($urlLogin = 'login.php')
{
    if (!estaLogueado()) {
        redirigir($urlLogin);
    }
}

// Obliga a ser administrador.
function requiereAdmin($urlLogin = 'login.php', $urlInicio = 'index.php')
{
    if (!estaLogueado()) {
        redirigir($urlLogin);
    }

    if (!esAdmin()) {
        redirigir($urlInicio);
    }
}

// Crea el token CSRF si no existe y lo devuelve.
function csrfToken()
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf'];
}

// Devuelve el campo oculto para los formularios.
function csrfCampo()
{
    return '<input type="hidden" name="csrf" value="' . htmlspecialchars(csrfToken()) . '">';
}

// Comprueba el token CSRF recibido por POST.
function comprobarCsrf()
{
    if (!isset($_POST['csrf']) || !isset($_SESSION['csrf'])) {
        return false;
    }

    return hash_equals($_SESSION['csrf'], $_POST['csrf']);
}

// Valida un identificador entero positivo.
function validarId($id)
{
    return filter_var($id, FILTER_VALIDATE_INT) !== false && (int)$id > 0;
}

// Valida una cantidad entera positiva.
function validarCantidad($cantidad)
{
    return filter_var($cantidad, FILTER_VALIDATE_INT) !== false && (int)$cantidad > 0;
}

// Valida un precio mayor que cero.
function validarPrecio($precio)
{
    return is_numeric($precio) && (float)$precio > 0;
}

// Valida un stock entero igual o mayor que cero.
function validarStock($stock)
{
    return filter_var($stock, FILTER_VALIDATE_INT) !== false && (int)$stock >= 0;
}

// Valida un correo electrónico.
function validarEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Plataformas que se pueden usar.
function plataformasPermitidas()
{
    return ['PC', 'PS5', 'Xbox', 'Switch'];
}

// Valida la plataforma.
function validarPlataforma($plataforma)
{
    return in_array($plataforma, plataformasPermitidas(), true);
}

// Valida el tema visual.
function validarTema($tema)
{
    return in_array($tema, ['claro', 'oscuro'], true);
}

// Devuelve el tema guardado en la cookie o el claro por defecto.
function temaActual()
{
    if (isset($_COOKIE['tema']) && validarTema($_COOKIE['tema'])) {
        return $_COOKIE['tema'];
    }

    return 'claro';
}

// Calcula el subtotal de una línea.
function calcularSubtotal($precio, $cantidad)
{
    return round((float)$precio * (int)$cantidad, 2);
}

// Suma los subtotales de todas las líneas.
function calcularTotal($lineas)
{
    $total = 0;

    foreach ($lineas as $linea) {
        $total += $linea['subtotal'];
    }

    return round($total, 2);
}
