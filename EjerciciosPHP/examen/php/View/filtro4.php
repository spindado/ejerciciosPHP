<?php
session_start();
$_SESSION["dormitorios"] = $_POST["dormitorios"];
$_SESSION["precio"] = $_POST["precio"];

echo $_SESSION["dormitorios"];
echo $_SESSION["precio"];
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
    <span>1.Tipo > 2.>Zona > 3.Características > <b>4.Extras</b></span>
    <h3>Paso 4: Elija los extras</h3>
    <form action="./busqueda.php" method="post">
        Extras: <br>
        garage:<input type="checkbox" name="garage" value="si"> <br>
        jardin:<input type="checkbox" name="jardin" value="si"> <br>
        padel:<input type="checkbox" name="padel" value="si"> <br>
        piscina:<input type="checkbox" name="piscina" value="si"> <br>
        zonascomunes:<input type="checkbox" name="zonascomunes" value="si"> <br>

        <a href="./filtro3.php">Anterior</a>
        <input type="submit" value="Siguiente">
    </form>
</body>
</html>