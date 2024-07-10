/* FACTURA_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
userid INT,
FECHA_FACTURA DATE,
MONTO DECIMAL(10.2),
METODO_PAGO VARCHAR(50),
FOREIGN KEY (userid) REFERENCES USUARIOS (USUARIO_ID) */
USE proyecto;

SELECT * from factura;
SELECT * from usuarios;


drop Table usuarios;
DROP Table factura;


CREATE TABLE usuarios (
   USUARIO_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(255) NOT NULL,
    APELLIDO VARCHAR(255) NOT NULL,
    CEDULA VARCHAR(255) NOT NULL,
    EMAIL VARCHAR(255),
    PHONE VARCHAR(255),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE FACTURA (
    FACTURA_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    USUARIO_ID INT,
    TRATAMIENTO VARCHAR(255),
    FECHA_FACTURA DATE,
    MONTO DECIMAL(10.2),
    METODO_PAGO VARCHAR(50),
    FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS (USUARIO_ID)
);

SELECT * from factura;
SELECT * from usuarios;

ALTER Table facturas ADD COLUMN MONTO DECIMAL(10,2);


SELECT u.nombre_usuario FROM facturas f JOIN usuarios u ON f.usuario_id = u.id WHERE f.metodo_pago = 'EFECTIVO';