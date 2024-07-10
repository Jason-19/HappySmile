CREATE TABLE login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    contraseña VARCHAR(255) NOT NULL
);
USE  PROYECTO;
INSERT INTO proyecto.login (usuario,contraseña) 
VALUES 
('admin', '12345678'),
('jason', '12345678'),
('maylin', '12345678'),
('admin', 'admin123');
