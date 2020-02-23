use imagenes;
CREATE TABLE imagenes(
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    tipo VARCHAR(15) NOT NULL,
    contenido LONGBLOB
) engine='Innodb';

