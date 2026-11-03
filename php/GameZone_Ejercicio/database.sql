CREATE DATABASE IF NOT EXISTS gamezone_repaso CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gamezone_repaso;
DROP TABLE IF EXISTS videojuegos;
CREATE TABLE videojuegos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100) NOT NULL,
 genero VARCHAR(60) NOT NULL,
 plataforma VARCHAR(60) NOT NULL,
 precio DECIMAL(8,2) NOT NULL,
 stock INT NOT NULL DEFAULT 0
);
INSERT INTO videojuegos (nombre,genero,plataforma,precio,stock) VALUES
('Minecraft','Sandbox','PC',24.99,12),
('Zelda: Breath of the Wild','Aventura','Nintendo Switch',49.99,5),
('EA Sports FC','Deportes','PlayStation 5',59.99,8);
