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
	description TEXT,
	picture varchar(150)
);

INSERT INTO sitio (title) VALUES ('M.C. Yolanda Moyao Martínez');

DROP TABLE IF EXISTS pagina;
CREATE TABLE pagina(
	id_pagina INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title TEXT,
	content TEXT
);
DROP TABLE IF EXISTS subpagina;
CREATE TABLE subpagina(
	id_pagina INT NOT NULL UNIQUE,
	pagina_superior INT NOT NULL,
	FOREIGN KEY(id_pagina) REFERENCES pagina(id_pagina),
	FOREIGN KEY(pagina_superior) REFERENCES pagina(id_pagina)
);

DROP TABLE IF EXISTS archivos;
CREATE TABLE archivos(
	id_pagina int not null,
	archivo varchar(150) not null
);

SELECT id_pagina,title FROM pagina WHERE id_pagina NOT IN (SELECT id_pagina FROM subpagina);

INSERT INTO subpagina (id_pagina,pagina_superior) VALUES (3,6);

DELETE FROM subpagina WHERE id_pagina = 3;

SELECT id_pagina FROM subpagina WHERE pagina_superior = 2;
SELECT pagina.title FROM pagina,subpagina WHERE pagina.id_pagina = subpagina.id_pagina;

SELECT pagina.title FROM pagina,subpagina WHERE pagina.id_pagina = (SELECT id_pagina FROM subpagina WHERE pagina_superior = 2);

SELECT pagina.title FROM pagina WHERE pagina.id_pagina = (SELECT id_pagina FROM subpagina WHERE pagina_superior = 7);
