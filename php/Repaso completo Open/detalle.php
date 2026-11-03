<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$juego = null;

if (validarId($id)) {
    $juego = obtenerVideojuegoPorId($conexion, (int)$id);
}

require_once 'includes/header.php';
?>
<h2>Detalles del videojuego</h2>
<?php if ($juego): ?>
    <h3><?= htmlspecialchars($juego['nombre']) ?></h3>
    <p>Género: <?= htmlspecialchars($juego['genero']) ?></p>
    <p>Plataforma: <?= htmlspecialchars($juego['plataforma']) ?></p>
    <p>Precio: <?= number_format($juego['precio'], 2, ',', '.') ?> €</p>
    <p>Stock: <?= (int)$juego['stock'] ?></p>
    <form action="carrito.php" method="POST">
        <?= csrfCampo() ?>
        <input type="hidden" name="accion" value="anadir">
        <input type="hidden" name="id" value="<?= (int)$juego['id'] ?>">
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" min="1" value="1" required>
        <button type="submit">Añadir al carrito</button>
    </form>
<?php else: ?>
    <p class="error">No se ha encontrado el videojuego.</p>
<?php endif; ?>
<a href="catalogo.php">Volver al catálogo</a>
<?php require_once 'includes/footer.php'; ?>
