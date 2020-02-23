create database if not exists pilar;
use pilar;
CREATE TABLE alumnos (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    alumno VARCHAR(13) NOT NULL,
    puntuacion SMALLINT(3) NOT NULL
) engine='Innodb';

INSERT INTO pilar.alumnos (alumno,puntuacion) VALUES ('pilar',100);
INSERT INTO pilar.alumnos (alumno,puntuacion) VALUES ('eli',200);
INSERT INTO pilar.alumnos (alumno,puntuacion) VALUES ('ana',220);
INSERT INTO pilar.alumnos (alumno,puntuacion) VALUES ('pablo',120);