create database tienda;
use tienda;

create table clientes(
	id_clientes int(5) primary key auto_increment,
	nick varchar(100);
	nombre varchar(90),
	contrasena varchar(10),
	direccion varchar(100),
	telefono int(12),
	email varchar(50)
);

create table productos(
	id_producto int(5) primary key auto_increment,
	nombre varchar(50),
	existencia varchar(10),
	costo varchar(20),
	marca varchar(50),
	nombre_proveedor varchar(50),
	nombre_categoria varchar(50)
);


create table proveedor(
id_proveedor int(5) primary key auto_increment,
nombre_proveedor varchar(50),
direccion varchar(50),
telefono int(12),
email varchar(50)
);

create table categoria(
id_categoria int(5) primary key auto_increment,
nombre_categoria varchar(50),
descripcion varchar(100)
);



