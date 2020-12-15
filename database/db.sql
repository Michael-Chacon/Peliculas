CREATE DATABASE peliculas;
USE peliculas;

CREATE TABLE pelicula(
		id int(255) auto_increment not null,
		titulo varchar(255) not null,
		descipcion text not null,
		año int(10) not null,
		genero varchar(5) not null, 
		CONSTRAINT pk_pelicula PRIMARY KEY (id)
)ENGINE=InnoDb;

CREATE TABLE generos(
		id int(255) auto_increment not null,
		nombre varchar(255) not null,
		CONSTRAINT pk_genero PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE actores(
		id int(255) auto_increment not null,
		nombre varchar(255) not null,
		CONSTRAINT pk_actores PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE actores_peliculas(
		id_actor int(255) not null,
		id_pelicula int(255) not null,
		CONSTRAINT fk_actores FOREIGN KEY (id_actor) REFERENCES actores(id),
		CONSTRAINT fk_peliculas FOREIGN KEY (id_pelicula) REFERENCES pelicula(id)
)ENGINE=InnoDb;

CREATE TABLE generos_peliculas(
		id_genero int(255) not null,
		id_pelicula int(255) not null,
		CONSTRAINT fk_generos_peliculas FOREIGN KEY (id_genero) REFERENCES generos(id),
		CONSTRAINT fk_peliculas_generos FOREIGN KEY (id_pelicula) REFERENCES pelicula(id)
)ENGINE=InnoDb;

CREATE TABLE usuarios(
	id int(255) auto_increment not null,
	nombre varchar(255) not null,
	apellidos varchar(255) not null,
	email varchar(255) not null,
	password varchar(255) not null,
	rol varchar(255) not null,
	CONSTRAINT	 pk_usuario PRIMARY KEY (id)
)ENGINE=InnoDb;

#consultas
SELECT p.*, ap.*, a.nombre FROM pelicula p 
INNER JOIN  actores_peliculas ap ON id_pelicula = 11
INNER JOIN actores a ON a.id = ap.id_actor
WHERE p.id = 11; 

SELECT ap.*, a.nombre FROM actores_peliculas ap
INNER JOIN actores a ON a.id = ap.id_actor
WHERE ap.id_pelicula = 10;

SELECT p.*,  a.nombre  AS 'actor' FROM pelicula p
INNER JOIN actores_peliculas ap ON ap.id_pelicula = p.id
INNER JOIN actores a ON a.id = 5
WHERE  ap.id_actor = 5;




