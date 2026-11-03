<?php

// ============================================================
// ANTES: este archivo tenia los datos de las series y se usaba
// desde index.php, search.php, statistics.php y add_series.php.
// AHORA: ya NO se usa. Los datos estan en la base de datos
// "tx_series" (ver includes/datuak.sql).
// Se deja aqui solo para que veas los datos originales.
// ============================================================

$series = [
    [
        "izenburua" => "Stranger Things",
        "generoa" => "Zientzia fikzioa",
        "denboraldiak" => 5,
        "balorazioa" => 8.7,
        "amaituta" => false,
        "irudia" => "img/stranger-things.jpg"
    ],
    [
        "izenburua" => "Breaking Bad",
        "generoa" => "Drama",
        "denboraldiak" => 5,
        "balorazioa" => 9.5,
        "amaituta" => true,
        "irudia" => "img/breaking-bad.jpg"
    ],
    [
        "izenburua" => "Dark",
        "generoa" => "Zientzia fikzioa",
        "denboraldiak" => 3,
        "balorazioa" => 8.7,
        "amaituta" => true,
        "irudia" => "img/dark.jpg"
    ],
    [
        "izenburua" => "Wednesday",
        "generoa" => "Fantasia",
        "denboraldiak" => 2,
        "balorazioa" => 8.0,
        "amaituta" => false,
        "irudia" => "img/wednesday.jpg"
    ],
    [
        "izenburua" => "The Last of Us",
        "generoa" => "Drama",
        "denboraldiak" => 2,
        "balorazioa" => 8.7,
        "amaituta" => false,
        "irudia" => "img/the-last-of-us.jpg"
    ],
    [
        "izenburua" => "La casa de papel",
        "generoa" => "Thriller",
        "denboraldiak" => 5,
        "balorazioa" => 8.2,
        "amaituta" => true,
        "irudia" => "img/la-casa-de-papel.jpg"
    ],
    [
        "izenburua" => "Black Mirror",
        "generoa" => "Zientzia fikzioa",
        "denboraldiak" => 7,
        "balorazioa" => 8.7,
        "amaituta" => false,
        "irudia" => "img/black-mirror.jpg"
    ],
    [
        "izenburua" => "Peaky Blinders",
        "generoa" => "Drama",
        "denboraldiak" => 6,
        "balorazioa" => 8.8,
        "amaituta" => true,
        "irudia" => "img/peaky-blinders.jpg"
    ]
];