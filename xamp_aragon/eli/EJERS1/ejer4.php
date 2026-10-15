<?php
//Dadas tres variables numéricas de tipo entero $a, $b y $c realizar un programa en PHP que 
//determine cuál tiene el mayor valor y cuál el menor.

$a = 10;
$b = 20;
$c = 30;

if ($a >= $b && $a >= $c) {
    echo "El mayor valor es: $a";
} elseif ($b >= $a && $b >= $c) {
    echo "El mayor valor es: $b";
} else {
    echo "El mayor valor es: $c";
}

if ($a <= $b && $a <= $c) {
    echo " El menor valor es: $a";
} elseif ($b <= $a && $b <= $c) {
    echo " El menor valor es: $b";
} else {
    echo " El menor valor es: $c";
}

?>