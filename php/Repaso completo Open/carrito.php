<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';

if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$mensaje = $_SESSION['mensaje_carrito'] ?? '';
$tipoMensaje = 'mensaje';
unset($_SESSION['mensaje_carrito']);

if (esPost()) {
    $tipoMensaje = 'error';

    if (!comprobarCsrf()) {
        $mensaje = 'La sesión ha caducado. Vuelve a intentarlo.';
    } else {
        $accion = $_POST['accion'] ?? '';
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_INT);

        if (!validarId($id)) {
            $mensaje = 'El videojuego no es válido.';
        } elseif ($accion === 'eliminar') {
            unset($_SESSION['carrito'][(int)$id]);
            $_SESSION['mensaje_carrito'] = 'Videojuego eliminado del carrito.';
            redirigir('carrito.php');
        } elseif ($accion === 'anadir' || $accion === 'actualizar') {
            if (!validarCantidad($cantidad)) {
                $mensaje = 'La cantidad debe ser un número entero mayor que cero.';
            } else {
                $juego = obtenerVideojuegoPorId($conexion, (int)$id);

                if (!$juego) {
                    $mensaje = 'El videojuego no existe.';
                } else {
                    if ($accion === 'anadir') {
                        $cantidadAnterior = $_SESSION['carrito'][(int)$id] ?? 0;
                        $nuevaCantidad = $cantidadAnterior + (int)$cantidad;
                    } else {
                        $nuevaCantidad = (int)$cantidad;
                    }

                    if ($nuevaCantidad > (int)$juego['stock']) {
                        $mensaje = 'No hay stock suficiente. Stock disponible: ' . (int)$juego['stock'] . '.';
                    } else {
                        $_SESSION['carrito'][(int)$id] = $nuevaCantidad;
                        $_SESSION['mensaje_carrito'] = 'Carrito actualizado.';
                        redirigir('carrito.php');
                    }
                }
            }
        } else {
            $mensaje = 'Acción no válida.';
        }
    }
}

$lineas = [];

foreach ($_SESSION['carrito'] as $id => $cantidad) {
    $juego = obtenerVideojuegoPorId($conexion, (int)$id);

    if (!$juego) {
        unset($_SESSION['carrito'][$id]);
        continue;
    }

    $subtotal = calcularSubtotal($juego['precio'], $cantidad);
    $lineas[] = [
        'id' => (int)$juego['id'],
        'nombre' => $juego['nombre'],
        'precio' => $juego['precio'],
        'cantidad' => (int)$cantidad,
        'subtotal' => $subtotal
    ];
}

$total = calcularTotal($lineas);

require_once 'includes/header.php';
?>
<h2>Mi carrito</h2>
<?php if ($mensaje): ?><p class="<?= $tipoMensaje ?>"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<?php if (empty($lineas)): ?>
    <p class="mensaje">Tu carrito está vacío.</p>
<?php else: ?>
    <table>
        <thead><tr><th>Videojuego</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th>Acciones</th></tr></thead>
        <tbody>
        <?php foreach ($lineas as $linea): ?>
            <tr>
                <td><?= htmlspecialchars($linea['nombre']) ?></td>
                <td><?= number_format($linea['precio'], 2, ',', '.') ?> €</td>
                <td><?= (int)$linea['cantidad'] ?></td>
                <td><?= number_format($linea['subtotal'], 2, ',', '.') ?> €</td>
                <td>
                    <form action="carrito.php" method="POST">
                        <?= csrfCampo() ?>
                        <input type="hidden" name="id" value="<?= (int)$linea['id'] ?>">
                        <input type="number" name="cantidad" min="1" value="<?= (int)$linea['cantidad'] ?>" required>
                        <button name="accion" value="actualizar">Actualizar</button>
                        <button name="accion" value="eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p><strong>Total: <?= number_format($total, 2, ',', '.') ?> €</strong></p>
    <form action="finalizar_compra.php" method="POST">
        <?= csrfCampo() ?>
        <button type="submit">Confirmar compra</button>
    </form>
<?php endif; ?>
<?php require_once 'includes/footer.php'; ?>
