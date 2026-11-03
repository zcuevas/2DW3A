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
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($email === '' || $password === '') {
            $mensaje = 'Debes rellenar todos los campos.';
        } elseif (!validarEmail($email)) {
            $mensaje = 'El correo electrónico no es válido.';
        } else {
            $usuario = obtenerUsuarioPorEmail($conexion, $email);

            if ($usuario && password_verify($password, $usuario['password'])) {
                session_regenerate_id(true);
                $_SESSION['usuario_id'] = (int)$usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['rol'] = $usuario['rol'];
                redirigir('index.php');
            }

            $mensaje = 'Correo electrónico o contraseña incorrectos.';
        }
    }
}

require_once 'includes/header.php';
?>
<h2>Iniciar sesión</h2>
<?php if ($mensaje): ?><p class="error"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<form action="login.php" method="POST">
    <?= csrfCampo() ?>
    <label for="email">Correo electrónico</label><input type="email" id="email" name="email" required>
    <label for="password">Contraseña</label><input type="password" id="password" name="password" required>
    <button type="submit">Entrar</button>
</form>
<?php require_once 'includes/footer.php'; ?>
