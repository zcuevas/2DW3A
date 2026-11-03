<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';

$mensaje = '';

if (esPost()) {
    if (!comprobarCsrf()) {
        $mensaje = 'La sesión ha caducado. Vuelve a intentarlo.';
    } else {
        $nombre = trim($_POST['nombre'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $repetir = $_POST['repetir'] ?? '';

        if ($nombre === '' || $email === '' || $password === '' || $repetir === '') {
            $mensaje = 'Debes rellenar todos los campos.';
        } elseif (strlen($nombre) > 100) {
            $mensaje = 'El nombre es demasiado largo.';
        } elseif (!validarEmail($email) || strlen($email) > 150) {
            $mensaje = 'El correo electrónico no es válido.';
        } elseif (strlen($password) < 8) {
            $mensaje = 'La contraseña debe tener al menos 8 caracteres.';
        } elseif ($password !== $repetir) {
            $mensaje = 'Las contraseñas no coinciden.';
        } elseif (existeEmail($conexion, $email)) {
            $mensaje = 'Ese correo electrónico ya está registrado.';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            if (insertarUsuario($conexion, $nombre, $email, $passwordHash)) {
                redirigir('login.php');
            }

            $mensaje = 'No se ha podido crear la cuenta.';
        }
    }
}

require_once 'includes/header.php';
?>
<h2>Crear una cuenta</h2>
<?php if ($mensaje): ?><p class="error"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<form action="registro.php" method="POST">
    <?= csrfCampo() ?>
    <label for="nombre">Nombre</label><input id="nombre" name="nombre" maxlength="100" required>
    <label for="email">Correo electrónico</label><input type="email" id="email" name="email" maxlength="150" required>
    <label for="password">Contraseña (mínimo 8 caracteres)</label><input type="password" id="password" name="password" minlength="8" required>
    <label for="repetir">Repetir contraseña</label><input type="password" id="repetir" name="repetir" required>
    <button type="submit">Registrarme</button>
</form>
<?php require_once 'includes/footer.php'; ?>
