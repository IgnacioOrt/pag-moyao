DROP DATABASE IF EXISTS master_moyao;
CREATE DATABASE master_moyao;
USE pagina;

DROP TABLE IF EXISTS administrador;
CREATE TABLE administrador(
	username VARCHAR(50) NOT NULL,
	password VARCHAR(100) NOT NULL
);

INSERT INTO administrador (username,password) VALUES ('admin','91fafacd1b1e8ee2150800333892a0584594327bea6003533aea7250c5a2e7f9');

DROP TABLE IF EXISTS sitio;
CREATE TABLE sitio(
	title TEXT,
	description TEXT
);

INSERT INTO sitio (title) VALUES ('M.C. Yolanda Moyao Martínez');

DROP TABLE IF EXISTS pagina;
CREATE TABLE sitio(
);
