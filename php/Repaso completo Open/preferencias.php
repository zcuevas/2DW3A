<?php
session_start();
require_once 'includes/funciones.php';

$mensaje = '';

if (esPost()) {
    if (!comprobarCsrf()) {
        $mensaje = 'La sesión ha caducado. Vuelve a intentarlo.';
    } else {
        $tema = $_POST['tema'] ?? '';

        if (validarTema($tema)) {
            setcookie('tema', $tema, time() + (7 * 24 * 60 * 60), '/');
            redirigir('preferencias.php?guardado=1');
        }

        $mensaje = 'El tema seleccionado no es válido.';
    }
}

if (isset($_GET['guardado'])) {
    $mensaje = 'Preferencias guardadas correctamente.';
}

$temaActual = temaActual();

require_once 'includes/header.php';
?>
<h2>Preferencias de visualización</h2>
<?php if ($mensaje): ?><p class="mensaje"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<form action="preferencias.php" method="POST">
    <?= csrfCampo() ?>
    <label for="tema">Tema</label>
    <select id="tema" name="tema">
        <option value="claro" <?= $temaActual === 'claro' ? 'selected' : '' ?>>Claro</option>
        <option value="oscuro" <?= $temaActual === 'oscuro' ? 'selected' : '' ?>>Oscuro</option>
    </select>
    <button type="submit">Guardar preferencias</button>
</form>
<?php require_once 'includes/footer.php'; ?>
