<?php
session_start();
require_once 'includes/funciones.php';

// El cierre de sesión se hace con POST y con token CSRF.
if (!esPost() || !comprobarCsrf()) {
    redirigir('index.php');
}

// Se eliminan los datos de sesión.
$_SESSION = [];

// Se invalida la cookie de sesión.
if (ini_get('session.use_cookies')) {
    $parametros = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $parametros['path'],
        $parametros['domain'],
        $parametros['secure'],
        $parametros['httponly']
    );
}

session_destroy();

// La cookie del tema no se elimina.
redirigir('index.php');
