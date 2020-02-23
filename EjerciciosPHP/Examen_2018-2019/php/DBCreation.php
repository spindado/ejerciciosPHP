<?php

  function createdb($configFile){
    $config = json_decode(file_get_contents($configFile), TRUE);

    $dsn = "{$config['DBType']}:host={$config['Host']}" ;
    $user = "{$config['User']}";
    $password = "{$config['Password']}";
    $dbname = $config['DBName'];

    try{
      $db = new PDO($dsn, $user, $password);
      $statement = "CREATE DATABASE IF NOT EXISTS " . $dbname;
      $db->query($statement);
      echo "Base de datos creada ";
    } catch (PDOException $e){
      echo "Falló la conexión: " . $e->getMessage();
    }

    $db =  null;
  }

  function createtables($sqlFile){
    require_once("./php/DBConection.php");

    $sql = file_get_contents($sqlFile);

    $conexion = new DBConection("./Config/config.json");

    $conexion->exec($sql);

    $conexion = null;

  }
 
  
?>