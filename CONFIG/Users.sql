
CREATE DATABASE PROYECTO;
use  proyecto;

CREATE TABLE USUARIOS(
    USUARIO_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(50) NOT NULL,
    APELLIDO VARCHAR(50) NOT NULL,
    CEDULA VARCHAR(50) NOT NULL,
    EMAIL VARCHAR(50),
    PHONE VARCHAR(50),
    TRATAMIENTO VARCHAR(100) NOT NULL,
);


-- INSERT INTO usuarios(NOMBRE,APELLIDO,CEDULA,EMAIL,PHONE,TRATAMIENTO,FECHA_FACTURA)
-- VALUES('$client[0]','$client[1]','$client[2]','$client[3]','$client[4]','$client[5]');


--DROP table usuarios; -- borrar la table cuidado!!!

SELECT * FROM USUARIOS; -- consulta para consulta a la base de datos 

SELECT usuarios.`NOMBRE` from factura.`FECHA_FACTURA`;
SELECT * from  factura;
SELECT * from  consult;

UPDATE usuarios set `USUARIO_ID` = 1;
