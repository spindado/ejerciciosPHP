<?php 
    //define("HOST","host=127.0.0.1");
    //define("USER","root");
    //define("PASSWORD","");
    $user="sergio";
    $pass="123456";
    try{
        $mbd = new PDO('mysql:host=localhost', $user,$pass);
        echo "conectado exitosamente";
    }catch(PDOException $e){
        print "Error en la conexion";
    }
?>