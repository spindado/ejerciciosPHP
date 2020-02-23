<?php
session_start();
$_SESSION["zona"] = $_POST["zona"];

echo $_SESSION["zona"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Búsqueda de viviendas</h1>
    <span>1.Tipo > 2.>Zona > <b>3.Características</b> > 4.Extras</span>
    <h3>Paso 3: Elija las características</h3>
    <form action="./filtro4.php" method="post">
        Dormitorios:
        <input type="radio" checked name="dormitorios" value="1">1</input>
        <input type="radio" name="dormitorios" value="2">2</input>
        <input type="radio" name="dormitorios" value="3">3</input>
        <input type="radio" name="dormitorios" value="4">4</input>
        <br>

        Precio€:         
        <input type="radio" checked  name="precio" value="50000">>50000</input>
        <input type="radio" name="precio" value="100000">>100000</input>
        <input type="radio" name="precio" value="150000">>100000</input>
        <input type="radio" name="precio" value="200000">>200000</input>
        <br>
        <a href="./filtro2.php">Anterior</a>
        <input type="submit" value="Siguiente">
        
    </form>
</body>
</html>