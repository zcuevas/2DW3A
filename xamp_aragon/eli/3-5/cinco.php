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
    $fechaAlta = $_POST['alta_data'] ?? '';
    
    // Recogemos el array de transportes seleccionados
    $transportes = $_POST['transporte'] ?? [];

    // 2. Validación de campos obligatorios (Nombre y Apellidos)
    if (empty($nombre) || empty($apellido)) {
        $mensajeError = "<p style='color: red; font-weight: bold;'>Por favor, rellena el nombre y los apellidos. Son obligatorios.</p>";
        $mostrarFormulario = true;
    } else {
        $mostrarFormulario = false;

        // 3. Evaluación según la edad
        if ($edad == "15") {
            // Rango 0 - 15
            $mensajeResultado = "<p>$nombre $apellido, eres muy joven, es mejor que vayas a clase andando.</p>";

        } elseif ($edad == "60") {
            // Rango 15 - 60
            $mensajesVehiculos = [];

            // Evaluamos todos los transportes que hayan sido seleccionados
            if (in_array("Car", $transportes)) {
                $mensajesVehiculos[] = "$nombre $apellido, intente utilizar lo menos posible el coche, por favor.";
            }
            if (in_array("Bike", $transportes)) {
                $mensajesVehiculos[] = "Bien hecho, $nombre $apellido. Vienes en bici.";
            }
            if (in_array("Bus", $transportes)) {
                $mensajesVehiculos[] = "Gracias por utilizar el bus, $nombre $apellido.";
            }

            // Construimos la respuesta con todos los medios de transporte elegidos
            if (!empty($mensajesVehiculos)) {
                $mensajeResultado = "<p>" . implode("<br>", $mensajesVehiculos) . "</p>";
            } else {
                $mensajeResultado = "<p>$nombre $apellido, no has seleccionado ningún medio de transporte.</p>";
            }

            // Si está entre 15 y 60, muestra la fecha de alta
            if (!empty($fechaAlta)) {
                $mensajeResultado .= "<p>Fecha de alta: $fechaAlta</p>";
            }

        } elseif ($edad == "100") {
            // Rango 60 - 100
            $mensajeResultado = "<p>$nombre $apellido, ¿estás seguro que no prefieres viajar en avión?</p>";

        } else {
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
if (!empty($mensajeError)) {
    echo $mensajeError;
}

if (!$mostrarFormulario) {
    echo $mensajeResultado;
    echo "<br><br><a href=''>Volver al formulario</a>";
}
?>

<?php if ($mostrarFormulario): ?>
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
  <!-- Usamos checkboxes y name="transporte[]" para permitir selección múltiple -->
  <input type="checkbox" id="vehicle1" name="transporte[]" value="Bike">
  <label for="vehicle1"> Bicicleta</label><br>
  <input type="checkbox" id="vehicle2" name="transporte[]" value="Car">
  <label for="vehicle2"> Coche</label><br>
  <input type="checkbox" id="vehicle3" name="transporte[]" value="Bus">
  <label for="vehicle3"> Autobus</label><br><br>

  <label for="alta_data">Fecha de alta:</label>
  <input type="date" id="alta_data" name="alta_data"><br><br>

  <input type="submit" value="Enviar">
</form>
<?php endif; ?>

</body>
</html>