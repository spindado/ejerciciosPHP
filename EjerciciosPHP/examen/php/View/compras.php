<?php
require "../Model/Connection.php";
require "../Model/Tipos.php";

$confPath = "../../conf/config.json";
$con = new Connection($confPath);
$pdo=$con->getPdo();

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
    <span><b>1.Tipo</b> > 2.>Zona > 3.Características > 4.Extras</span>
    <h3>Paso 1: Elija el tipo de vivienda</h3>
    <form action="./filtro2.php" method="post">
        Tipo: 
        <select name="tipo" id="">
        <?php
        $tipos = new Tipos();
        $arrTipos = $tipos->getTipos($pdo);
            foreach ($arrTipos as $t) {
               echo "<option value='$t->tipo'>$t->tipo</option>";
            }
        ?>
        </select>
        <input type="submit" value="Siguiente">
    </form>
</body>
</html>