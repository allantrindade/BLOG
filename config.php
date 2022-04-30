<?php

const PATH_ROOT = __DIR__;
const URL = 'http://localhost/FATEC/BLOG';

$host = 'localhost';
$port = '3306';
$db = 'P2';
$user = 'root';
$passwd = '';

// Create Database P2;

// Use P2;

// Create Table `usuarios` (
//     id int primary key auto_increment,
//     nome varchar(30) DEFAULT NULL,
//     sobrenome varchar(30) DEFAULT NULL,
//     email varchar(30) DEFAULT NULL,
//     senha varchar(60) DEFAULT NULL,
//     cep int(9) NOT NULL,
//     cidade varchar(30) DEFAULT NULL,
//     estado varchar(30) DEFAULT NULL,
//     rua varchar(50) NOT NULL,
//     bairro varchar(50) NOT NULL,
//     numero int(9) NOT NULL,
//     avatar varchar(40) DEFAULT NULL
//   )

// insert into usuarios (nome, sobrenome, email, senha, cep, cidade, estado, rua, bairro, numero, avatar)
//                 values('admin','','admin@email.com','$2y$12$EcyyjRk1nu2pRI3wHNEkve/awBjnr/5F4uEJnW/c9tw5lwMAORiT.','','','','','','','admin');

// Create Table publicacao
// (
//     id int primary key auto_increment,
//     idusuario VARCHAR(3),
//     titulo VARCHAR(50),
//     mensagem VARCHAR(10000),    
//     nome VARCHAR(60),
//     sobrenome VARCHAR(30),
//     avatar VARCHAR(40),
//     imagempost VARCHAR(40),
//     datahora VARCHAR(50) 
// );

// Create Table comentarios
// (
//     id int primary key auto_increment,
//     idpublicacao VARCHAR(3),
//     idusuario VARCHAR(7),
//     comentario VARCHAR(10000),    
//     nome VARCHAR(60),
//     sobrenome VARCHAR(30),
//     avatar VARCHAR(40),
//     datahora VARCHAR(50)    
// );