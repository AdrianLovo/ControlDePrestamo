CREATE DATABASE prestamo;

USE prestamo;

CREATE TABLE IF NOT EXISTS prestamo(
    idPrestamo INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
    nombrePersona VARCHAR(50),
    totalPrestamo INT,
    cuota INT,
    cantidadCuotas INT,
    fechaPrestamo DATE,
    PRIMARY KEY (idPrestamo)
);

CREATE TABLE IF NOT EXISTS cuotaprestamo(
    idCuotaPrestamo INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
    idPrestamo INT,
    numeroCuota INT,
    fechaCancelada date,    
    PRIMARY KEY (idCuotaPrestamo)
);

CREATE USER 'prestamo'@'localhost' IDENTIFIED BY '';

GRANT ALL PRIVILEGES ON * . * TO 'prestamo'@'localhost';

SELECT * FROM prestamo;
SELECT * FROM cuotaPrestamo;

