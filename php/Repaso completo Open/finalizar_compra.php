<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';

requiereLogin('login.php');

$mensaje = '';

if (esPost()) {
    if (!comprobarCsrf()) {
        $mensaje = 'La sesión ha caducado. Vuelve a intentarlo.';
    } elseif (empty($_SESSION['carrito'])) {
        $mensaje = 'El carrito está vacío. No se puede realizar la compra.';
    } else {
        $resultado = registrarPedido($conexion, (int)$_SESSION['usuario_id'], $_SESSION['carrito']);

        if ($resultado['ok']) {
            $_SESSION['carrito'] = [];
            $_SESSION['mensaje_compra'] = 'Pedido número ' . $resultado['id'] . ' realizado correctamente.';
            redirigir('finalizar_compra.php');
        }

        $mensaje = $resultado['mensaje'];
    }
} else {
    $mensaje = $_SESSION['mensaje_compra'] ?? '';
    unset($_SESSION['mensaje_compra']);

    if ($mensaje === '') {
        redirigir('carrito.php');
    }
}

require_once 'includes/header.php';
?>
<h2>Resultado de la compra</h2>
<?php if ($mensaje): ?><p class="mensaje"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<a href="catalogo.php">Volver al catálogo</a>
<?php require_once 'includes/footer.php'; ?>
