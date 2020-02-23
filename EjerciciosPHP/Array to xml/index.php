<?php

//FUNCIÓN: convertir datos a xml a partir de un array
function arrayToXml($array, $rootElement = null, $xml = null)
{
    $_xml = $xml;
    if ($_xml === null) {
        $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
    }
    foreach ($array as $k => $v) {
        if (is_array($v)) {
            arrayToXml($v, $k, $_xml->addChild($k));
        } else {
            $_xml->addChild($k, $v);
        }
    }
    return $_xml->asXML();
}

// Creating an array for demo 

//con esta funciona:
$my_array = array(
    "perro" => "Muffinhead",
    "gato" => "Cuddles"
);



// Calling arrayToxml Function and printing the result 
$miXML = arrayToXml($my_array);

var_dump($miXML);
$archi_xml = simplexml_load_string($miXML);

//ESTO CREA UN FICHERO CON EL CONTENIDO DEL XML GENERADO A PARTIR DEL ARRAY
$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$ldr = $dom->loadXML($miXML); //XML de prueba
$dom->save('mixml.xml');


//https://www.youtube.com/watch?v=exsVaj6QSWg
