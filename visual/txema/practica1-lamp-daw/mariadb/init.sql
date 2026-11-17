CREATE DATABASE IF NOT EXISTS daw_tienda CHARACTER SET utf8mb4 COLLATE
utf8mb4_spanish_ci;
USE daw_tienda;
CREATE TABLE IF NOT EXISTS productos (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
precio DECIMAL(10,2) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
INSERT INTO productos (nombre, precio) VALUES
('Servidor Cloud VPS DAW', 19.99),
('Dominio Web .es', 9.95),
('Certificado SSL Wildcard', 49.00);