<?php 
/** Para comparar un elemento o atributo con una cadena o
 *  pasarlo a una función que requiera una cadena,
 *  debes convertirlo a cadena mediante (string).
 *  De otra forma, PHP tratará el elemento como un objeto.*/
include 'ejemplo.php';

$xml = simplexml_load_string($xmlstr);

if ((string) $xml->movie->title == 'PHP: Behind the Parser'){
    print 'Mi pelicula favorita';
}

htmlentities((string) $xml->movie->title);
?>