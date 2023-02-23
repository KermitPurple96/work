create database VIAJES;
USE VIAJES;
SET SQL_SAFE_UPDATES = 0;
show tables;

delete from viaje;
drop table img;
drop table viaje;

select * from img where cod_viaje = '1';
select titulo,resumen from viaje where cod = '1';

select * from viaje;
select * from img;
select * from usuario;


CREATE TABLE img (
   cod_viaje INT,
   ruta VARCHAR(255),
   PRIMARY KEY (cod_viaje, ruta),
   FOREIGN KEY (cod_viaje) REFERENCES viaje(cod)
);

CREATE TABLE VIAJE(
	COD INT PRIMARY KEY AUTO_INCREMENT,
    TITULO VARCHAR(30) NOT NULL,
    ENTRADA TINYTEXT NOT NULL,
    TEXTO longtext NOT NULL,
    AUTOR VARCHAR(30) NOT NULL,
    FECHA VARCHAR(30) NOT NULL
);

CREATE TABLE USUARIO(
	COD INT PRIMARY KEY AUTO_INCREMENT,
    NAME VARCHAR(30) NOT NULL,
    PASSWORD VARCHAR(30) NOT NULL,
    CORREO VARCHAR(30) NOT NULL
);

CREATE TABLE COMENTARIOS(
	CODC INT PRIMARY KEY AUTO_INCREMENT,
	CODENT int,
    texto MEDIUMTEXT
);