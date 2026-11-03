<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';

requiereLogin('login.php');

$idUsuario = (int)$_SESSION['usuario_id'];
$pedidos = obtenerPedidosUsuario($conexion, $idUsuario);

require_once 'includes/header.php';
?>
<h2>Mis pedidos</h2>
<?php if (empty($pedidos)): ?>
    <p class="mensaje">Todavía no has realizado ninguna compra.</p>
<?php else: ?>
    <?php foreach ($pedidos as $pedido): ?>
        <?php $lineas = obtenerLineasPedido($conexion, (int)$pedido['id'], $idUsuario); ?>
        <h3>Pedido número <?= (int)$pedido['id'] ?></h3>
        <p>Fecha: <?= htmlspecialchars($pedido['fecha']) ?></p>
        <p>Total: <?= number_format($pedido['total'], 2, ',', '.') ?> €</p>
        <table>
            <thead><tr><th>Videojuego</th><th>Cantidad</th><th>Precio unitario</th><th>Subtotal</th></tr></thead>
            <tbody>
            <?php foreach ($lineas as $linea): ?>
                <tr>
                    <td><?= htmlspecialchars($linea['nombre']) ?></td>
                    <td><?= (int)$linea['cantidad'] ?></td>
                    <td><?= number_format($linea['precio_unitario'], 2, ',', '.') ?> €</td>
                    <td><?= number_format(calcularSubtotal($linea['precio_unitario'], $linea['cantidad']), 2, ',', '.') ?> €</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
<?php endif; ?>
<?php require_once 'includes/footer.php'; ?>
