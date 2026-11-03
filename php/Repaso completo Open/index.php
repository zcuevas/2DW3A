<?php
session_start();
require_once 'includes/funciones.php'; // El alumnado creará este archivo.
require_once 'includes/header.php';
?>
<h2>Bienvenido a GameWorld</h2>
<p>Consulta nuestro catálogo de videojuegos y realiza tus pedidos.</p>
<a class="boton" href="catalogo.php">Ver catálogo</a>
<?php require_once 'includes/footer.php'; ?>
