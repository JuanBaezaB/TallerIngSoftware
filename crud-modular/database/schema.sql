-- Crear la base de datos "repuestos" con cotejamiento utf8_spanish_ci
CREATE DATABASE IF NOT EXISTS repuestos CHARACTER SET utf8 COLLATE utf8_spanish_ci;

-- Usar la base de datos "repuestos"
USE repuestos;

-- Crear la tabla "marcas"
CREATE TABLE marcas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    origen ENUM('Francia', 'China', 'Japón') NOT NULL,
    logo VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Ejemplo de cómo insertar datos en la tabla
INSERT INTO marcas (nombre, origen, logo) VALUES
('Marca1', 'Francia', 'logo1.png'),
('Marca2', 'China', 'logo2.png'),
('Marca3', 'Japón', 'logo3.png');


