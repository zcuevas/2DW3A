<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';

$busqueda = trim($_GET['busqueda'] ?? '');
$plataforma = $_GET['plataforma'] ?? '';
$orden = $_GET['orden'] ?? 'nombre';
$pagina = filter_input(INPUT_GET, 'pagina', FILTER_VALIDATE_INT);

if ($pagina === false || $pagina === null || $pagina < 1) {
    $pagina = 1;
}

// Validar plataforma y orden.
if (!validarPlataforma($plataforma)) {
    $plataforma = '';
}

if (!in_array($orden, ['nombre', 'precio_asc', 'precio_desc'], true)) {
    $orden = 'nombre';
}

$porPagina = 5;
$totalVideojuegos = contarVideojuegos($conexion, $busqueda, $plataforma);
$totalPaginas = max(1, (int)ceil($totalVideojuegos / $porPagina));

if ($pagina > $totalPaginas) {
    $pagina = $totalPaginas;
}

$desplazamiento = ($pagina - 1) * $porPagina;
$videojuegos = buscarVideojuegos($conexion, $busqueda, $plataforma, $orden, $porPagina, $desplazamiento);

require_once 'includes/header.php';
?>
<h2>Catálogo de videojuegos</h2>
<form action="catalogo.php" method="GET">
    <label for="busqueda">Buscar por nombre</label>
    <input id="busqueda" name="busqueda" value="<?= htmlspecialchars($busqueda) ?>">
    <label for="plataforma">Plataforma</label>
    <select id="plataforma" name="plataforma">
        <?php foreach (['' => 'Todas', 'PC' => 'PC', 'PS5' => 'PS5', 'Xbox' => 'Xbox', 'Switch' => 'Switch'] as $valor => $texto): ?>
            <option value="<?= htmlspecialchars($valor) ?>" <?= $plataforma === $valor ? 'selected' : '' ?>><?= htmlspecialchars($texto) ?></option>
        <?php endforeach; ?>
    </select>
    <label for="orden">Orden</label>
    <select id="orden" name="orden">
        <option value="nombre" <?= $orden === 'nombre' ? 'selected' : '' ?>>Nombre</option>
        <option value="precio_asc" <?= $orden === 'precio_asc' ? 'selected' : '' ?>>Precio ascendente</option>
        <option value="precio_desc" <?= $orden === 'precio_desc' ? 'selected' : '' ?>>Precio descendente</option>
    </select>
    <button type="submit">Buscar</button>
    <a class="boton" href="catalogo.php">Limpiar</a>
</form>
<table>
    <thead><tr><th>Nombre</th><th>Género</th><th>Plataforma</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr></thead>
    <tbody>
    <?php foreach ($videojuegos as $juego): ?>
        <tr>
            <td><?= htmlspecialchars($juego['nombre']) ?></td>
            <td><?= htmlspecialchars($juego['genero']) ?></td>
            <td><?= htmlspecialchars($juego['plataforma']) ?></td>
            <td><?= number_format($juego['precio'], 2, ',', '.') ?> €</td>
            <td><?= (int)$juego['stock'] ?></td>
            <td><a href="detalle.php?id=<?= (int)$juego['id'] ?>">Ver detalles</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php if (empty($videojuegos)): ?>
    <p class="mensaje">No hay videojuegos que cumplan los criterios de búsqueda.</p>
<?php endif; ?>
<?php if ($totalPaginas > 1): ?>
    <p>
        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <?php if ($i === $pagina): ?>
                <strong><?= $i ?></strong>
            <?php else: ?>
                <a href="catalogo.php?<?= htmlspecialchars(http_build_query([
                    'busqueda' => $busqueda,
                    'plataforma' => $plataforma,
                    'orden' => $orden,
                    'pagina' => $i
                ])) ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </p>
<?php endif; ?>
<?php require_once 'includes/footer.php'; ?>
