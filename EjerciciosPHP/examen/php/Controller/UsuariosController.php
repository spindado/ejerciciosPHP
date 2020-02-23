<?php
require "../Model/Connection.php";
require "../Model/Usuarios.php";
require "../Model/Viviendas.php";

$confPath = "../../conf/config.json";
$con = new Connection($confPath);
$pdo = $con->getPdo();

if (isset($_POST["user"]) && isset($_POST["password"])) {
    $name = $_POST["user"];
    $pass = $_POST["password"];
    $user = new Usuarios();
    $sub = $user->getSubscription($pdo, $name, $pass);

    if ($sub === "basic") {
        header("Location: ../View/compras.php");
    } elseif ($sub === "admin") {
        $vivienda = new Viviendas();
        $path = "../../xml/viviendas.xml";
        $arr = xml_to_arr($path, 'vivienda');
        foreach ($arr as $v) {
            $f = flatten($v);
            $vivienda->insert($pdo,$f);
        }
    }
} else {
    header("Location: ../index.php");
}

function xml_to_arr($path, $root)
{
    if (file_exists($path)) {
        $xmlFile = simplexml_load_file($path);
        $xml = json_encode($xmlFile);
        $arrXml = json_decode($xml, true);
        return $arrXml[$root];
    }else{
        return [];
    }
}

function flatten($arr){
    $tempArr = [];
    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($arr));
    foreach ($it as $k => $v) {
        $tempArr[$k] = $v;
    }
    return $tempArr;
}