<?php
session_start();
$rutaBase = '../';
require_once '../includes/conexion.php';
require_once '../includes/funciones_bd.php';
require_once '../includes/funciones.php';

requiereAdmin('../login.php', '../index.php');

$mensaje = '';
$nombre = '';
$genero = '';
$plataforma = '';
$precio = '';
$stock = '';

if (esPost()) {
    if (!comprobarCsrf()) {
        $mensaje = 'La sesión ha caducado. Vuelve a intentarlo.';
    } else {
        $nombre = trim($_POST['nombre'] ?? '');
        $genero = trim($_POST['genero'] ?? '');
        $plataforma = $_POST['plataforma'] ?? '';
        $precio = $_POST['precio'] ?? '';
        $stock = $_POST['stock'] ?? '';

        if ($nombre === '' || $genero === '' || $plataforma === '' || $precio === '' || $stock === '') {
            $mensaje = 'Debes rellenar todos los campos.';
        } elseif (strlen($nombre) > 100 || strlen($genero) > 50) {
            $mensaje = 'El nombre o el género son demasiado largos.';
        } elseif (!validarPlataforma($plataforma)) {
            $mensaje = 'La plataforma no es válida.';
        } elseif (!validarPrecio($precio)) {
            $mensaje = 'El precio debe ser mayor que cero.';
        } elseif (!validarStock($stock)) {
            $mensaje = 'El stock debe ser un número entero igual o mayor que cero.';
        } elseif (existeVideojuegoDuplicado($conexion, $nombre, $plataforma)) {
            $mensaje = 'Ya existe un videojuego con ese nombre y plataforma.';
        } else {
            $correcto = insertarVideojuego(
                $conexion,
                $nombre,
                $genero,
                $plataforma,
                (float)$precio,
                (int)$stock
            );

            if ($correcto) {
                $_SESSION['mensaje_admin'] = 'Videojuego añadido correctamente.';
                redirigir('videojuegos.php');
            }

            $mensaje = 'No se ha podido añadir el videojuego.';
        }
    }
}

require_once '../includes/header.php';
?>
<h2>Añadir videojuego</h2>
<?php if ($mensaje): ?><p class="error"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<form action="anadir.php" method="POST">
    <?= csrfCampo() ?>
    <label for="nombre">Nombre</label><input id="nombre" name="nombre" maxlength="100" value="<?= htmlspecialchars($nombre) ?>" required>
    <label for="genero">Género</label><input id="genero" name="genero" maxlength="50" value="<?= htmlspecialchars($genero) ?>" required>
    <label for="plataforma">Plataforma</label>
    <select id="plataforma" name="plataforma" required>
        <option value="">Selecciona una plataforma</option>
        <?php foreach (plataformasPermitidas() as $opcion): ?>
            <option value="<?= htmlspecialchars($opcion) ?>" <?= $plataforma === $opcion ? 'selected' : '' ?>><?= htmlspecialchars($opcion) ?></option>
        <?php endforeach; ?>
    </select>
    <label for="precio">Precio</label><input type="number" id="precio" name="precio" min="0.01" max="999999.99" step="0.01" value="<?= htmlspecialchars($precio) ?>" required>
    <label for="stock">Stock</label><input type="number" id="stock" name="stock" min="0" step="1" value="<?= htmlspecialchars($stock) ?>" required>
    <button type="submit">Guardar videojuego</button>
</form>
<?php require_once '../includes/footer.php'; ?>
