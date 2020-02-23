<?php

  require_once("./php/DBConection.php");
  require_once("./php/DBCreation.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <div class="login">
    <h2 class="login-title">Login</h2>
    <form action="./php/Login.php" method="post">
      <input type="text" name="user" placeholder="Usuario">
      <input type="password" name="passwd" placeholder="Contraseña">
      <input type="submit" name="submit">
    </form>
  </div>

  <div class="error">
  <?php
    try{
      $conexion = new DBConection("./config/config.json");
    }catch(PDOException $e){
      if($e->getCode() == 1049){
        createdb("./config/config.json");
        createtables("./config/viviendas.sql");
      }else if($e->getCode() == 2003){
        echo "<p>No se pudo conectar con el servidor</p>";
      }else{
        echo "<p>La conexión se realizó con éxito</p>";
      }
    }

  ?>
  </div>
  
</body>
</html>
