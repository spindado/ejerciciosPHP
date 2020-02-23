<?php

$file = 'catalog.xml';

if(file_exists($file)) {
    // xmlFile es un objeto SimpleXMLElement
    $xmlFile = simplexml_load_file($file);
} else {
    exit('Error al abrir '. $file);
}

// Asigno el nuevo dato
$xmlFile->Book[2]->Genre = 'Aventuras';
// En este caso lo modifico a mano, pero si tiene que ser
// según una condicón recorreria el array Book con un foreach

// Lo guardo en el mismo fichero
$result = $xmlFile->asXML($file);

// Si lo ha guardado bien $result es true
echo $result ? 'Ha sido modificado' : 'No se ha modificado';