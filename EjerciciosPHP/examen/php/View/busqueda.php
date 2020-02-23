<?php
require "../Model/Connection.php";
require "../Model/Viviendas.php";
error_reporting(1);

$confPath = "../../conf/config.json";
$con = new Connection($confPath);
$pdo=$con->getPdo();

session_start();
$_SESSION["garage"] = $_POST["garage"];
$_SESSION["jardin"] = $_POST["jardin"];
$_SESSION["padel"] = $_POST["padel"];
$_SESSION["piscina"] = $_POST["piscina"];
$_SESSION["zonascomunes"] = $_POST["zonascomunes"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <a href="./compras.php">Nueva búsqueda</a>
    <form action="../Controller/json.php" method="post">
    <table>
    <?php
        echo "<tr>";
        echo "<th>tipo</th>";
        echo "<th>zona</th>";
        echo "<th>precio</th>";
        echo "<th>dormitorios</th>";
        echo "<th>imagen</th>";
        echo "<th>comprar</th>";
        echo "</tr>";
        $viviendas = new Viviendas();
        $arrV = $viviendas->getViviendas($pdo, $_SESSION);
        foreach ($arrV as $v) {
            echo "<tr>";
            echo "<td>$v->tipo</td>";
            echo "<td>$v->zona</td>";
            echo "<td>$v->dormitorios</td>";
            echo "<td>$v->precio</td>";
            echo "<td><img src='data:;base64," . base64_encode($v->imagen) ."'/></td>";
            echo "<td><input type='checkbox' value='$v->id' name='check[]'/></td>";
            echo "</tr>";
        }
    ?>
    </table>
    <input type="submit" value="Comprar">
    </form>
</body>
</html>