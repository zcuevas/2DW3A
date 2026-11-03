<?php
// Este archivo se incluye después de procesar formularios y redirecciones.
$tema = temaActual();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameWorld</title>
    <link rel="stylesheet" href="<?= $rutaBase ?? '' ?>css/estilos.css">
</head>
<body class="<?= htmlspecialchars($tema) ?>">
<div class="contenedor">
<header>
    <h1>GameWorld</h1>
    <nav>
        <a href="<?= $rutaBase ?? '' ?>index.php">Inicio</a>
        <a href="<?= $rutaBase ?? '' ?>catalogo.php">Catálogo</a>
        <a href="<?= $rutaBase ?? '' ?>carrito.php">Carrito</a>
        <a href="<?= $rutaBase ?? '' ?>mis_pedidos.php">Mis pedidos</a>
        <a href="<?= $rutaBase ?? '' ?>preferencias.php">Preferencias</a>
        <?php if (estaLogueado()): ?>
            <form action="<?= $rutaBase ?? '' ?>logout.php" method="POST" style="display: inline;">
                <?= csrfCampo() ?>
                <button type="submit" style="background: none; border: 0; color: white; padding: 0; cursor: pointer;">Salir</button>
            </form>
            <?php if (esAdmin()): ?>
                <a href="<?= $rutaBase ?? '' ?>admin/videojuegos.php">Administración</a>
            <?php endif; ?>
        <?php else: ?>
            <a href="<?= $rutaBase ?? '' ?>registro.php">Registro</a>
            <a href="<?= $rutaBase ?? '' ?>login.php">Entrar</a>
        <?php endif; ?>
    </nav>
</header>
<main>
