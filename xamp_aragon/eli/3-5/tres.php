<?php
// Variables para controlar la visualización y mensajes
$mostrarFormulario = true;
$mensajeError = "";
$mensajeResultado = "";

// Comprobamos si el formulario se ha enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Recogemos los datos en sendas variables
    $nombre = trim($_POST['fname'] ?? '');
    $apellido = trim($_POST['lname'] ?? '');
    $edad = $_POST['age'] ?? null;
    $transporte = $_POST['vehicle'] ?? null;
    $fechaAlta = $_POST['alta_data'] ?? '';

    // 2. Validación de campos obligatorios (Nombre y Apellidos)
    if (empty($nombre) || empty($apellido)) {
        $mensajeError = "<p style='color: red; font-weight: bold;'>Por favor, rellena el nombre y los apellidos. Son obligatorios.</p>";
        $mostrarFormulario = true; // Se vuelve a mostrar el formulario
    } else {
        // Se han rellenado los campos obligatorios
        $mostrarFormulario = false;

        // 3. Evaluación según la edad
        if ($edad == "15") {
            // Rango 0 - 15
            $mensajeResultado = "<p>$nombre y $apellido, eres muy joven, es mejor que vayas a clase andando</p>";

        } elseif ($edad == "60") {
            // Rango 15 - 60
            $mensajeTransporte = "";

            // Evaluación de la única opción de transporte seleccionada
            if ($transporte == "Car") {
                $mensajeTransporte = "$nombre $apellido, intente utilizar lo menos posible el coche, por favor.";
            } elseif ($transporte == "Bike") {
                $mensajeTransporte = "Bien hecho, $nombre $apellido. Vienes en bici";
            } elseif ($transporte == "Bus") {
                $mensajeTransporte = "Gracias por utilizar el bus, $nombre $apellido";
            } else {
                $mensajeTransporte = "$nombre $apellido, no has seleccionado ningún transporte.";
            }

            $mensajeResultado = "<p>$mensajeTransporte</p>";

            // Si está entre 15 y 60, muestra la fecha de alta
            if (!empty($fechaAlta)) {
                $mensajeResultado .= "<p>Fecha de alta: $fechaAlta</p>";
            }

        } elseif ($edad == "100") {
            // Rango 60 - 100
            $mensajeResultado = "<p>$nombre $apellido, estás seguro que no prefieres viajar en avión?</p>";

        } else {
            // Si no seleccionó ningún rango de edad
            $mensajeResultado = "<p>Datos de $nombre $apellido registrados correctamente.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h1>DATOS DEL ALUMNO</h1>

<?php
// Muestra el mensaje de error si falta el nombre o apellido
if (!empty($mensajeError)) {
    echo $mensajeError;
}

// Muestra el resultado final si todo es correcto
if (!$mostrarFormulario) {
    echo $mensajeResultado;
    echo "<br><br><a href=''>Volver al formulario</a>";
}
?>

<?php if ($mostrarFormulario): ?>
<!-- Formulario con method="POST" para enviar los datos -->
<form method="POST" action="">
  <label for="fname">Nombre:</label>
  <input type="text" id="fname" name="fname"><br><br>

  <label for="lname">Apellido:</label>
  <input type="text" id="lname" name="lname"><br><br>

  <p>Edad</p>
  <input type="radio" id="age1" name="age" value="15">
  <label for="age1">0 - 15</label><br>
  <input type="radio" id="age2" name="age" value="60">
  <label for="age2">15 - 60</label><br>  
  <input type="radio" id="age3" name="age" value="100">
  <label for="age3">60 - 100</label><br><br>

  <p>Cómo vienes al centro de estudios?</p>
  <!-- Cambiado a type="radio" y compartiendo el mismo name="vehicle" -->
  <input type="radio" id="vehicle1" name="vehicle" value="Bike">
  <label for="vehicle1"> Bicicleta</label><br>
  <input type="radio" id="vehicle2" name="vehicle" value="Car">
  <label for="vehicle2"> Coche</label><br>
  <input type="radio" id="vehicle3" name="vehicle" value="Bus">
  <label for="vehicle3"> Autobus</label><br><br>

  <label for="alta_data">Fecha de alta:</label>
  <input type="date" id="alta_data" name="alta_data"><br><br>

  <input type="submit" value="Enviar">
</form>
<?php endif; ?>

</body>
</html>