<?php

//ALMACENAR IMAGENES EN MYSQL

spl_autoload_register(function ($className) {
    include __DIR__ . '../../clases/' . $className . '.php'; // PARA CUANDO NO USAS NAMESPACE
});

$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];
$file_tmp_name = $_FILES['archivo']['tmp_name'];

$extension = explode('.', $nombre_archivo); //devuelve un array 
$ext = end($extension); // coge el último valor del array anterior
$name = reset($extension); // coge el primer valor del array
$extPermitidas = array('jpg', 'jpeg', 'png', 'pdf', 'gif');

if (in_array($ext, $extPermitidas)) {  // si la extensión jpg existe en allowed

    if ($_FILES['archivo']['error'] === 0) {

        if ($tamano_archivo < 1000000000) {

            $nuevo_nombre = $name . "." . time();
            $carpeta_destino = '../Uploads/' . $nuevo_nombre . "." . $ext;
            $res = move_uploaded_file($file_tmp_name, $carpeta_destino . $nombre_archivo);

            if ($res) {
                echo "Imagen en servidor";
                echo "<br>";
                readImage($carpeta_destino, $nombre_archivo, $tamano_archivo, $tipo_archivo);
            } else {
                echo "Error en la ruta";
            }
        } else {
            echo "El archivo es demasiado grande";
        }
    } else {
        echo $fileError;
        echo "Hay un error de subida";
    }
} else {
    echo "No se puede incluir esa extensión";
}

// FUNCIÓN QUE LEE LA IMAGEN GUARDADA Y LA INSERTA EN LA BBDD
function readImage($carpeta_destino, $nombre_archivo, $tamano_archivo, $tipo_archivo)
{
    //apuntamos al archivo que queremos abrir:
    $archivo_objetivo = fopen($carpeta_destino . $nombre_archivo, "r");
    //leer los bytes del archivo al que apuntamos:
    $contenido = fread($archivo_objetivo, $tamano_archivo);
    //addslashes: función que escapa los caracteres que php no entiende
    $contenido = addslashes($contenido);
    //cerrar
    fclose($archivo_objetivo);

    $insertQuery = "insert into imagenes(nombre,tipo,contenido) values('$nombre_archivo','$tipo_archivo','$contenido')";
    $con = Conexion::getInstance();
    $res = $con->query($insertQuery);
    if ($res) {
        echo "img insertada en BBDD";
        header("Refresh: 3;url= ./controlReadImageBBDD.php");
    } else {
        echo "error al insertar img en BBDD";
    }
}

//los datos en la bbdd se almacenan en base64
