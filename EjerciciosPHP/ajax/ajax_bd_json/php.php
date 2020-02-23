<?php
include './connection.php';

header("Content-Type: application/json; charset=UTF-8");

// Capturar objeto
//$objeto = json_decode($_GET['objeto'], false);
$objeto = json_decode($_POST['objeto'], false);
// Para probar que funciona
//$objeto = json_decode('{"valor":111}');


// Crear la consulta SQL
$valor = $objeto->valor;
$query = <<<SQL
SELECT * FROM pilar.alumnos WHERE puntuacion>=$valor;
SQL;
$result = $pdo->prepare($query);
$result->execute();
$rows = $result->fetchAll();

//Esta es la salida
echo json_encode($rows);
?>