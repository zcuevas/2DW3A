<?php
//Mostrar la tabla de multiplicar del 2. Emplear el for, luego el while y por último el do/while.
echo "Tabla del 2 con for:<br>";
for ($i = 1; $i <= 10; $i++) {
    $resultado = 2 * $i;
    echo " 2 x $i = $resultado<br>";
}

echo "Tabla del 2 con while:<br>";
$i = 1;
while ($i <= 10) {
    $resultado = 2 * $i;
    echo " 2 x $i = $resultado<br>";
    $i++;
}

echo "Tabla del 2 con do/while:<br>";
$i = 1;
do {
    $resultado = 2 * $i;
    echo "2 x $i = $resultado<br>";
    $i++;
} while ($i <= 10);

?>