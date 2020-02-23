<?php
require "../Model/Connection.php";
require "../Model/Zonas.php";

$confPath = "../../conf/config.json";
$con = new Connection($confPath);
$pdo=$con->getPdo();

session_start();
$_SESSION["tipo"] = $_POST["tipo"];

echo $_SESSION["tipo"];
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
    <span>1.Tipo > <b>2.>Zona</b> > 3.Características > 4.Extras</span>
    <h3>Paso 2: Elija la zona</h3>
    <form action="./filtro3.php" method="post">
        Zona: 
        <select name="zona" id="">
        <?php
        $zonas = new Zonas();
        $arrZonas = $zonas->getZonas($pdo);
            foreach ($arrZonas as $z) {
               echo "<option value='$z->lugar'>$z->lugar</option>";
            }
        ?>
        </select>
        <a href="./compras.php">Anterior</a>
        <input type="submit" value="Siguiente">
    </form>
</body>
</html>