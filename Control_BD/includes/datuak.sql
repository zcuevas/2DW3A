-- ============================================================
-- ANTES: los datos estaban escritos a mano en includes/datuak.php
-- AHORA: los datos estan en una base de datos MySQL.
-- ============================================================

-- Creamos la base de datos (si ya existe, no da error).
CREATE DATABASE IF NOT EXISTS tx_series;

-- Le decimos a MySQL que trabaje con esta base de datos.
USE tx_series;

-- Creamos la tabla de series (si ya existe, no da error).
CREATE TABLE IF NOT EXISTS serieak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    izenburua VARCHAR(100) NOT NULL,
    generoa VARCHAR(50) NOT NULL,
    denboraldiak INT NOT NULL,
    balorazioa DECIMAL(3,1) NOT NULL,
    amaituta TINYINT(1) NOT NULL,
    irudia VARCHAR(255)
);

-- Metemos las mismas series que habia en datos.php.
-- amaituta: 0 = martxan, 1 = amaituta.
INSERT INTO serieak (izenburua, generoa, denboraldiak, balorazioa, amaituta, irudia) VALUES
('Stranger Things', 'Zientzia fikzioa', 5, 8.7, 0, 'img/stranger-things.jpg'),
('Breaking Bad', 'Drama', 5, 9.5, 1, 'img/breaking-bad.jpg'),
('Dark', 'Zientzia fikzioa', 3, 8.7, 1, 'img/dark.jpg'),
('Wednesday', 'Fantasia', 2, 8.0, 0, 'img/wednesday.jpg'),
('The Last of Us', 'Drama', 2, 8.7, 0, 'img/the-last-of-us.jpg'),
('La casa de papel', 'Thriller', 5, 8.2, 1, 'img/la-casa-de-papel.jpg'),
('Black Mirror', 'Zientzia fikzioa', 7, 8.7, 0, 'img/black-mirror.jpg'),
('Peaky Blinders', 'Drama', 6, 8.8, 1, 'img/peaky-blinders.jpg');
