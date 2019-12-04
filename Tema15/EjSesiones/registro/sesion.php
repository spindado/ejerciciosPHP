<?php
 session_start();
 if (isset($_GET['terminar_sesion'])){
     //Borramos todas las variables de la sesión
     $_SESSION=array();
     //Caducamos la cookie
     setcookie('PHPSESSID','',time()-3600);
     //destruimos los datos de la sesión en el script actual
     session_destroy();
     //redirigimos a la página de acreditación
     header('Location: registro.php');
 }
 if (!isset($_SESSION['uname'])){
     header('Location: registro.php');
 }
 echo '<a href="sesion.php?terminar_sesion=1">Terminar sesion</a><br />';
 echo '<a href="http://www.google.es">GOOGLE</a>';
 ?>