-- Crear la base de datos "register" con cotejamiento utf8_spanish_ci
CREATE DATABASE IF NOT EXISTS register CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;

-- Usar la base de datos "register"
USE register;

-- Crear la tabla "roles"
CREATE TABLE IF NOT EXISTS roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- Insertar los roles
INSERT INTO
  roles (name)
VALUES
  ('admin'),
  ('user');

-- Crear la tabla "permissions"
CREATE TABLE IF NOT EXISTS permissions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- Crear la tabla "roles_permissions"
CREATE TABLE IF NOT EXISTS roles_permissions (
  role_id INT,
  permission_id INT,
  FOREIGN KEY (role_id) REFERENCES roles(id),
  FOREIGN KEY (permission_id) REFERENCES permissions(id),
  PRIMARY KEY (role_id, permission_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- Crear la tabla "users"
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role_id INT,
  FOREIGN KEY (role_id) REFERENCES roles(id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- Insertar un usuario normal
INSERT INTO
  users (username, email, password, role_id)
VALUES
  ('user', 'user@example.com', MD5("123"), 2);

-- Insertar un usuario con rol de administrador
INSERT INTO
  users (username, email, password, role_id)
VALUES
  ('admin_user', 'admin@example.com', MD5("123"), 1);