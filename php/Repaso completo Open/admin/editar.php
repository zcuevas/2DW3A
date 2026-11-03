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
        } elseif (existeVideojuegoDuplicado($conexion, $nombre, $plataforma, (int)$id)) {
            $mensaje = 'Ya existe otro videojuego con ese nombre y plataforma.';
        } else {
            $correcto = actualizarVideojuego(
                $conexion,
                (int)$id,
                $nombre,
                $genero,
                $plataforma,
                (float)$precio,
                (int)$stock
            );

            if ($correcto) {
                $_SESSION['mensaje_admin'] = 'Videojuego actualizado correctamente.';
                redirigir('videojuegos.php');
            }

            $mensaje = 'No se ha podido actualizar el videojuego.';
        }

        // Se muestran los valores enviados si hay algún error.
        $juego['nombre'] = $nombre;
        $juego['genero'] = $genero;
        $juego['plataforma'] = $plataforma;
        $juego['precio'] = $precio;
        $juego['stock'] = $stock;
    }
}

require_once '../includes/header.php';
?>
<h2>Editar videojuego</h2>
<?php if ($mensaje): ?><p class="error"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<?php if ($juego): ?>
<form action="editar.php?id=<?= (int)$juego['id'] ?>" method="POST">
    <?= csrfCampo() ?>
    <label for="nombre">Nombre</label><input id="nombre" name="nombre" maxlength="100" value="<?= htmlspecialchars($juego['nombre']) ?>" required>
    <label for="genero">Género</label><input id="genero" name="genero" maxlength="50" value="<?= htmlspecialchars($juego['genero']) ?>" required>
    <label for="plataforma">Plataforma</label>
    <select id="plataforma" name="plataforma" required>
        <?php foreach (plataformasPermitidas() as $plataforma): ?>
            <option value="<?= htmlspecialchars($plataforma) ?>" <?= $juego['plataforma'] === $plataforma ? 'selected' : '' ?>><?= htmlspecialchars($plataforma) ?></option>
        <?php endforeach; ?>
    </select>
    <label for="precio">Precio</label><input type="number" id="precio" name="precio" min="0.01" max="999999.99" step="0.01" value="<?= htmlspecialchars((string)$juego['precio']) ?>" required>
    <label for="stock">Stock</label><input type="number" id="stock" name="stock" min="0" step="1" value="<?= (int)$juego['stock'] ?>" required>
    <button type="submit">Guardar cambios</button>
</form>
<?php endif; ?>
<?php require_once '../includes/footer.php'; ?>
