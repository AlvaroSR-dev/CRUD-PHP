create database crud;
use crud;
create table usuarios(
	id int unsigned auto_increment primary key not null,
    nombre varchar(100),
    apellido1 varchar(100),
    apellido2 varchar(100),
    edad int
    )
    
SELECT * FROM usuarios;