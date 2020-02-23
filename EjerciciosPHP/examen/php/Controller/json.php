<?php
require "../Model/Connection.php";
require "../Model/Viviendas.php";

$confPath = "../../conf/config.json";
$con = new Connection($confPath);
$pdo = $con->getPdo();

$viviendas = new Viviendas();
$vs =$viviendas->getViviendasByID($pdo, $_POST["check"]);

$json = json_encode($vs, true);
$file = "../../json/buy.json";
if (file_exists($file)) {
    file_put_contents($file, $json, FILE_APPEND);
} else {
    file_put_contents($file, $json);
}
