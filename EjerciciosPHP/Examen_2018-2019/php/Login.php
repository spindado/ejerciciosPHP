<?php
  session_start();

  require_once("../data/users.php");

  if(isset($users[$_POST["user"]])){
    if($users[$_POST["user"]]["passwd"] == $_POST["passwd"]){
      $_SESSION["user"] = $_POST["user"];
      if($users[$_POST["user"]]["profile"] == "administrator"){
        $_SESSION["profile"] = "administrator";
        header("Location: ./admin.php");
      }else{
        $_SESSION["profile"] = "client";
        header("Location: ./client.php");
      }
    }else{
      echo "Credenciales incorrectas. Será redirigido en 5 segundos.";
      header("refresh:5; url=../index.php");
    }
  }else{
    echo "Credenciales incorrectas. Será redirigido en 5 segundos.";
    header("refresh:5; url=../index.php");
  }


?>