<?php 
    
    $host = "mysql:host=localhost";//direccion servidor
    $user="root";//usuario
    $pass="";//contraseña
    try{
        $mbd = new PDO($host, $user,$pass);
        echo "conectado exitosamente<br>";
    }catch(PDOException $e){
        print "Error en la conexion";
    }
?>