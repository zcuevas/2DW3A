<?php
$num = 32; 

// Verificar que el número esté en el rango permitido
if ($num < 20 || $num > 60) {
    echo "El número debe estar entre el 20 y el 60.";
} else {
    // Decenas exactas
    $decenasEspeciales = [
        20 => "veinte",
        30 => "treinta",
        40 => "cuarenta",
        50 => "cincuenta",
        60 => "sesenta"
    ];

    if (array_key_exists($num, $decenasEspeciales)) { 
        echo $decenasEspeciales[$num];
    } else {
        // Separar decenas y unidades
        $decena = (int)($num / 10);
        $unidad = $num % 10;

        // Cambiar a texto
        $nombresUnidades = [
            1 => "uno",
            2 => "dos",
            3 => "tres",
            4 => "cuatro",
            5 => "cinco",
            6 => "seis",
            7 => "siete",
            8 => "ocho",
            9 => "nueve"
        ];

        // 21-29
        if ($decena == 2) {
            echo "veinti" . $nombresUnidades[$unidad];
        } else {
            // Decenas con unidades
            $nombresDecenas = [
                3 => "treinta",
                4 => "cuarenta",
                5 => "cincuenta"
            ];

            echo $nombresDecenas[$decena] . " y " . $nombresUnidades[$unidad];
        }
    }
}
?>