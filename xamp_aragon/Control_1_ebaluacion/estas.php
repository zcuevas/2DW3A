<?php
include "anadir.php";
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar serie</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>
        <div class="bilatu">
            <img src="img/logo.png" alt="Tx_Series logoa">

            <nav>
                <a href="txantiloia_home.html">Hasiera</a>
                <a href="bilatu.html">Bilatu</a>
                <a href="formulario.html">Seriea gehitu</a>
                <a href="estas.html">Estatistikak</a>
            </nav>
        </div>
    </header>
        
    <main>
         <h1>Estadisticas</h1>
    </main>

    
<?php
$promedioDia = array_sum($valoracion) / count($valoracion);
echo "El promedio de valoraciones es: " . $promedioDia . "<br>";
?>


    <footer>
        <p>Tx_Series - Web Garapena Zerbitzari Ingurunean</p>
    </footer>

</body>
</html>


