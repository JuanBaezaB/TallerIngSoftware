-- Create the roles table
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT
);

-- Insert some roles
INSERT INTO
    roles (name, description)
VALUES
    (
        'Administrator',
        'Role with administration permissions'
    ),
    (
        'User',
        'Standard role for regular users'
    );

-- Create the users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- Insert an administrator user
INSERT INTO
    users (name, email, password, role_id)
VALUES
    (
        'Admin User',
        'admin@example.com',
        12345678,
        1
    );

-- Insert a regular user
INSERT INTO
    users (name, email, password, role_id)
VALUES
    (
        'Regular User',
        'user@example.com',
        12345678,
        2
    );