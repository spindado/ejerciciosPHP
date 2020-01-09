<?php 
include("conexion.php");

$create=<<<SQL

create database if not exists prueba;

SQL;
//al crear la tabla al final del ) engine="Imnodb"
try{
    $statement = $db->prepare($create);
    $statement->execute();
}catch(PDOException $e){
    print "error al crear la tabla";
}

?>