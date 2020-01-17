<?php
include("conexion.php");
$query= file_get_contents("tables.sql");
/*$query=<<<SQL
create database if not exists prueba1;
use prueba1;
CREATE TABLE tabla_prueba (
    id INT(6) PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(50)
) engine='Innodb';
SQL;*/

try{
    $statement= $mbd->prepare($query);
    $statement->execute();
    //echo "creado BBDD y una tabla";
    echo "creado base de datos y tablas exitosamente";
}catch(PDOException $exception){
    print $exception;
}
?>