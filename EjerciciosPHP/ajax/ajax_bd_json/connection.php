<?php

$db = "mysql:host=localhost";
$dsn = 'mysql:dbname=pilar;host=localhost';
$usuario = 'root';
$contraseña = '';

function createDB($db, $usuario, $contraseña) {
    try {
        $pdo = new PDO($db, $usuario, $contraseña, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $create = file_get_contents("./sql/create.sql");
        $statement = $pdo->prepare($create);
        $statement->execute();
    } catch(PDOException $e) {
        echo "<span>No se ha creado la base de datos</span><br/>";
        print "Error:" . $e->getMessage() . "<br/>";
    }
    return $pdo;
}

function createPDO($db, $dsn, $usuario, $contraseña) {
    try {
        $pdo = new PDO($dsn, $usuario, $contraseña, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "<h2>No existe la base de datos, creándola</h2><br/>";
        $pdo = createDB($db, $usuario, $contraseña);
    }
    return $pdo;
}

$pdo = createPDO($db, $dsn, $usuario, $contraseña);

?>