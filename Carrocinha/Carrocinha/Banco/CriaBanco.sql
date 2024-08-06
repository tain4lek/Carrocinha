DROP DATABASE IF EXISTS carrocinha;

CREATE DATABASE carrocinha;

USE carrocinha;

CREATE TABLE Pessoa (
 id INT	PRIMARY KEY auto_increment,
 nome VARCHAR (50),
 email VARCHAR(50),
 endereco VARCHAR(50),
 bairro VARCHAR (50),
 id_cidade INT,
 cep VARCHAR(10)
 );


CREATE TABLE Animal (
id_animal INT PRIMARY KEY auto_increment,
nome VARCHAR(20),
Especie VARCHAR(20),
Raca VARCHAR(20),
Data_nascimento VARCHAR(10),
Idade VARCHAR (2),
Castrado VARCHAR(3),
id_pessoa int
);


CREATE TABLE Cidade (
id_cidade INT PRIMARY KEY auto_increment,
Nome_cidade VARCHAR(20),
Estado VARCHAR(20)
);