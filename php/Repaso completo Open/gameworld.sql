-- Importar desde phpMyAdmin. Esta instalación reinicia las tablas GameWorld.
CREATE DATABASE IF NOT EXISTS gameworld CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gameworld;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS detalle_pedido;
DROP TABLE IF EXISTS pedidos;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS videojuegos;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE usuarios (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100) NOT NULL,
 email VARCHAR(150) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 rol ENUM('cliente','admin') NOT NULL DEFAULT 'cliente'
);
CREATE TABLE videojuegos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100) NOT NULL,
 genero VARCHAR(50) NOT NULL,
 plataforma VARCHAR(30) NOT NULL,
 precio DECIMAL(8,2) NOT NULL,
 stock INT NOT NULL,
 CONSTRAINT ck_precio CHECK (precio > 0),
 CONSTRAINT ck_stock CHECK (stock >= 0),
 UNIQUE KEY uq_nombre_plataforma (nombre,plataforma)
);
CREATE TABLE pedidos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 id_usuario INT NOT NULL,
 fecha DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 total DECIMAL(10,2) NOT NULL,
 FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);
CREATE TABLE detalle_pedido (
 id INT AUTO_INCREMENT PRIMARY KEY,
 id_pedido INT NOT NULL,
 id_videojuego INT NOT NULL,
 cantidad INT NOT NULL,
 precio_unitario DECIMAL(8,2) NOT NULL,
 FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
 FOREIGN KEY (id_videojuego) REFERENCES videojuegos(id)
);
INSERT INTO videojuegos(nombre,genero,plataforma,precio,stock) VALUES
('Minecraft','Aventura','PC',29.99,8),
('EA Sports FC 25','Deportes','PS5',49.99,0),
('The Legend of Zelda','Aventura','Switch',59.99,5),
('Mario Kart 8','Carreras','Switch',39.99,12),
('God of War','Acción','PS5',44.99,3),
('Forza Horizon 5','Carreras','Xbox',54.99,7),
('Hollow Knight','Plataformas','PC',14.99,15),
('Stardew Valley','Simulación','PC',13.99,20),
('Spider-Man 2','Acción','PS5',69.99,4),
('Animal Crossing','Simulación','Switch',49.99,6);

INSERT INTO usuarios (nombre, email, password, rol)
VALUES (
    'Administrador',
    'admin@gameworld.local',
    '$2y$12$FNt8c4lmX82aEd9ISb3lwuDTg1UZnVD/2mXn74EPDxJrSD1BAen82',
    'admin'
);
