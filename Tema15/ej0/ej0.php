<?php 
session_start();
$_SESSION["nombre"] = "Yo Banakafalata";
echo "<p> El nombre es $_SESSION[nombre]</p>";
?>