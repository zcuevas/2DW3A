<?php
$valor = $_POST['nombre'];

setcookie("prueba", $valor, time()+3600,"/","");
?>
<html>
<head>
<title>Ejemplo de PHP</title>
</head>
<body>
<H1>Ejemplo de uso de cookie</H1>
Se ha establecido una cookie de nombre <b>ejemusuario</b>
con el valor: <b><?php echo $valor; ?></b> que será válida durante 1 hora.
</body>
</html>