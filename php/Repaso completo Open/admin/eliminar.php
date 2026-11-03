<?php
session_start();
$rutaBase = '../';
require_once '../includes/conexion.php';
require_once '../includes/funciones_bd.php';
require_once '../includes/funciones.php';

requiereAdmin('../login.php', '../index.php');

$mensaje = '';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$juego = null;

if (validarId($id)) {
    $juego = obtenerVideojuegoPorId($conexion, (int)$id);
}

if (!$juego) {
    $mensaje = 'Videojuego no encontrado.';
} elseif (esPost()) {
    if (!comprobarCsrf()) {
        $mensaje = 'La sesión ha caducado. Vuelve a intentarlo.';
    } elseif (videojuegoTienePedidos($conexion, (int)$id)) {
        $mensaje = 'No se puede eliminar este videojuego porque aparece en pedidos anteriores.';
    } else {
        if (eliminarVideojuego($conexion, (int)$id)) {
            $_SESSION['mensaje_admin'] = 'Videojuego eliminado correctamente.';
            redirigir('videojuegos.php');
        }

        $mensaje = 'No se ha podido eliminar el videojuego.';
    }
}

require_once '../includes/header.php';
?>
<h2>Eliminar videojuego</h2>
<?php if ($mensaje): ?><p class="error"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<?php if ($juego): ?>
    <p>¿Seguro que quieres eliminar <strong><?= htmlspecialchars($juego['nombre']) ?></strong>?</p>
    <form action="eliminar.php?id=<?= (int)$juego['id'] ?>" method="POST">
        <?= csrfCampo() ?>
        <button type="submit">Confirmar eliminación</button>
        <a class="boton" href="videojuegos.php">Cancelar</a>
    </form>
<?php endif; ?>
<?php require_once '../includes/footer.php'; ?>
