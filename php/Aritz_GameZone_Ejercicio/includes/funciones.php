<?php
// TODO 1: funcion textoValido($texto): true si trim($texto) no está vacío.
function  textoValido($texto) {
    $nombre = trim($texto);

    return $nombre !== "";
}
// TODO 2: funcion precioValido($precio): true si es numérico y mayor que 0.
function precioValido($precio) {
    return is_numeric($precio) && $precio > 0;
}
// TODO 3: funcion stockValido($stock): true si es entero y >= 0.
// Pista: filter_var($stock, FILTER_VALIDATE_INT).
function stockValido($stock) {
    return filter_var($stock, FILTER_VALIDATE_INT);
}