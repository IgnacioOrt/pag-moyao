DROP DATABASE IF EXISTS master_moyao;
CREATE DATABASE master_moyao;
USE  master_moyao;

DROP TABLE IF EXISTS administrador;
CREATE TABLE administrador(
	username VARCHAR(50) NOT NULL,
	password VARCHAR(100) NOT NULL
);

INSERT INTO administrador (username,password) VALUES ('admin','aecdee96e9359dbd81fca2ce1984501493f328d445225d123f4c202f2928ee5e');

DROP TABLE IF EXISTS sitio;
CREATE TABLE sitio(
	title TEXT,
	description TEXT
);

INSERT INTO sitio (title) VALUES ('M.C. Yolanda Moyao Martínez');

DROP TABLE IF EXISTS pagina;
CREATE TABLE pagina(
	id_pagina INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title TEXT,
	content TEXT
);

