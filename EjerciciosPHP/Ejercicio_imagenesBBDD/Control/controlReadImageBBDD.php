<?php
echo "leer imágenes de la BBDD";
echo "<br>";
spl_autoload_register(function ($className) {
    include __DIR__ . '../../clases/' . $className . '.php'; // PARA CUANDO NO USAS NAMESPACE
});

$id = "";
$contenido = "";
$tipo = "";

$con = Conexion::getInstance();

$selectImage = "select * from imagenes";
$rows = $con->selectQuery($selectImage);

foreach ($rows as $row) {
    $id = $row['id'];
    $contenido = $row['contenido'];
    $tipo = $row['tipo'];
    echo "Id: " . $id;
    echo "<img src='data:image/jpeg; base64," . base64_encode($contenido) . "'/>";
}
