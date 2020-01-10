<?php
// Declaramos el fichero de conexión
include("conexion.php");
try {
    $conn = new PDO("mysql:host=localhost", $user, $pass);
    // Establecer el modo de error PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $create=<<<SQL
    create database if not exists prueba;
    
    use prueba;
    CREATE TABLE alumnos(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(60) NOT NULL,
    apellidos VARCHAR(60) NOT NULL,
    email VARCHAR(60),
    fecha TIMESTAMP
    )engine="Imnod";

SQL;
    // Variable sql que creará la tabla

    // Usar exec () sino devuelve ningún resultado
    $conn->exec($sql);
    echo "La tabla ha sido creada";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>