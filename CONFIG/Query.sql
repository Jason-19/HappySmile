
use  proyecto;

CREATE TABLE USUARIOS (
ID INT NOT NULL AUTO_INCREMENT,
NOMBRE VARCHAR(100) NOT NULL,
APELLIDO VARCHAR(100) NOT NULL,
EMAIL VARCHAR(100) NOT NULL,
CLAVE VARCHAR(255) NOT NULL,
FECHA_NACIMIENTO DATE,
PRIMARY KEY(ID)
);