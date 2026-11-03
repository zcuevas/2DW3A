<?php
require_once "includes/conexion.php";
require_once "includes/funciones.php";
require_once "includes/funciones_bd.php";

$mensaje = "";
$tipoMensaje = "";

// TODO 6: si llega POST, recoge los cinco campos.
// Valida con las funciones que has creado.
// Si todo es válido, llama a insertarVideojuego().
// Guarda un mensaje de éxito o error.
// Pista: $_POST['campo'] ?? '' y trim().
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $genero = trim($_POST['genero'] ?? '');
    $plataforma = trim($_POST['plataforma'] ?? '');
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';
    // 2. Verificar si está vacío
    if (!textoValido($nombre)) {
        $mensaje = "El nombre no puede estar vacío.";
    } else if (!textoValido($genero)) {
        $mensaje = "El genero no puede estar vacío.";
    } else if (!textoValido($plataforma)) {
        $mensaje = "El plataforma no puede estar vacío.";
    } else if (!precioValido($precio)) {
        $mensaje = "El precio no puede estar vacío.";
    } else if (!stockValido($stock)) {
        $mensaje = "El stock no puede estar vacío.";
    } else {
        $resultado = insertarVideojuego($conexion, $nombre, $genero, $plataforma, $precio, $stock);

        if ($resultado) {
            $mensaje = "Videojuego añadido correctamente.";
        } else {
            $mensaje = "Error al añadir el videojuego.";
        }
        header("Location: index.php?exito=1");
        exit;
    }
}
// TODO 7: llama a obtenerVideojuegos($conexion) y guarda el resultado.
$resultado = obtenerVideojuegos($conexion);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameZone | Catálogo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <header class="cabecera">
        <div class="contenedor">
            <p class="marca">GAMEZONE</p>
            <p class="subtitulo">Catálogo de videojuegos</p>
        </div>
    </header>
    <main class="contenedor rejilla">
        <section class="panel">
            <h1>Añadir videojuego</h1>
            <?php if ($mensaje !== ""): ?>
                <p class="mensaje <?= htmlspecialchars($tipoMensaje) ?>"><?= htmlspecialchars($mensaje) ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <label for="nombre">Nombre</label><input id="nombre" name="nombre" required>
                <label for="genero">Género</label><input id="genero" name="genero" required>
                <label for="plataforma">Plataforma</label><input id="plataforma" name="plataforma" required>
                <label for="precio">Precio (€)</label><input type="number" id="precio" name="precio" min="0.01" step="0.01" required>
                <label for="stock">Stock</label><input type="number" id="stock" name="stock" min="0" step="1" required>
                <button type="submit">Guardar videojuego</button>
            </form>
        </section>
        <section class="panel">
            <h2>Videojuegos disponibles</h2>
            <?php if (isset($resultado) && $resultado && $resultado->num_rows > 0): ?>
                <div class="tabla-contenedor">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Género</th>
                                <th>Plataforma</th>
                                <th>Precio</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($juego = $resultado->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($juego['nombre']) ?></td>
                                    <td><?= htmlspecialchars($juego['genero']) ?></td>
                                    <td><?= htmlspecialchars($juego['plataforma']) ?></td>
                                    <td><?= number_format((float)$juego['precio'], 2, ',', '.') ?> €</td>
                                    <td><?= (int)$juego['stock'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?><p>Todavía no hay videojuegos en el catálogo.</p><?php endif; ?>
        </section>
    </main>
    <footer class="pie">Ejercicio de repaso PHP + MySQL</footer>
</body>

</html>