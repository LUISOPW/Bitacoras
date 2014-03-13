<?php
$conex = mysql_connect('localhost','root','luis');
mysql_query('create database extremo');
mysql_select_db('extremo',$conex);
$clientes = "create table clientes(id_clientes int(5) primary key auto_increment,nombre varchar(40),contrasena varchar(10),direccion varchar(40),telefono int(12),email varchar(30),nick varchar(20),apellido varchar(50))";
$productos = "create table productos(id_producto int(5) primary key auto_increment,nombre varchar(50),existencia varchar(10),costo varchar(20),marca varchar(50),nombre_proveedor varchar(50),nombre_categoria varchar(50),imagen varchar(40),descripcion varchar(250))";
$proveedor = "create table proveedor(id_proveedor int(5) primary key auto_increment,nombre_proveedor varchar(50),direccion varchar(50),telefono int(12),email varchar(50))";
$categoria = "create table categoria(id_categoria int(5) primary key auto_increment,nombre_categoria varchar(50),descripcion varchar(100))";
mysql_query($productos,$conex);	
mysql_query($proveedor,$conex);	
mysql_query($clientes,$conex);	
mysql_query($categoria,$conex);	
mysql_close($conex); 
echo "Base de datos creada satisfactoriamente :D";
?>