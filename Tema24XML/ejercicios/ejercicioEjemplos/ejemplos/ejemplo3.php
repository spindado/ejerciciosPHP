<?php 
//Accediendo a elementos no unicos en simpleXML
//cuando existen multiple instancias de un elemento padre, se aplican las tencnicas normales de iteracion
include 'ejemplo.php';

$xml = simplexml_load_string($xmlstr);
/*Para cada nodo <movie>,mostramos un <plot> */
foreach($xml->movie as $movie){
    echo $movie->plot, '<br/>';
}

?>