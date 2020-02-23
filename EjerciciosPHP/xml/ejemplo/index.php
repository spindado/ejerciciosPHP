<?php

// #1 Cargarlo desde un string de php
include 'ejemplo.php';
$xml = simplexml_load_string($xmlstr);

// #1 Cargarlo desde un fichero xml
/*if (file_exists('ejemplo.xml')) {
    $xml = simplexml_load_file('ejemplo.xml');
 
    var_dump($xml);
} else {
    exit('Error al abrir test.xml.');
}
echo '<br/>';*/

// #2 Obteniendo <plot>
echo $xml->movie[0]->plot . '<br />'; // "So this language. It's like..."

// #3 Accediendo a elementos no únicos en SimpleXML
/* Para cada nodo <movie>, mostramos un <plot>. */
foreach ($xml->movie as $movie) {
    echo $movie->plot, '<br />';
}

// #4 Usando atributos
/* Accede a los nodos <rating> de la primera película.
 * Output the rating scale, too. */
foreach ($xml->movie[0]->rating as $rating) {
    switch((string) $rating['type']) { // Obtenemos los atributos como elementos índice
    case 'thumbs':
        echo $rating, ' thumbs up <br />';
        break;
    case 'stars':
        echo $rating, ' stars <br />';
        break;
    }
}

// #5 Comparando Elementos y Atributos con Texto
if ((string) $xml->movie->title == 'PHP: Behind the Parser') {
    print 'Mi pel&iacute;cula favorita. <br/>';
}

htmlentities((string) $xml->movie->title);

// #6 Usando Xpath
/* '//' sirve como comodín. Para especificar paths absolutos
 * hay que omitir una de las barras invertidas.*/
foreach ($xml->xpath('//character') as $character) {
    echo $character->name, 'played by ', $character->actor, '<br />';
}

// #7 Definiendo valores
/* mostrará un documento XML nuevo, como el original, excepto
 * que el nuevo XML tendrá Miss Coder en vez de Ms. Coder. */
$xml->movie[0]->characters->character[0]->name = 'Miss Coder';

echo $xml->asXML(), '<br/>';

// #8 Interoperabilidad con DOM
/* PHP tiene un mecanismo para convertir nodos XML entre los
 * formatos de SimpleXML y DOM. Este ejemplo muestra como se
 * podría cambiar un elemento DOM a otro SimpleXML. */
$dom = new domDocument;
$dom->loadXML('<books><book><title>blah</title></book></books>');
if (!$dom) {
     echo 'Error al parsear el documento';
     exit;
}

$s = simplexml_import_dom($dom);

echo $s->book[0]->title . '<br/>';

// #9 Añadir nodo/s y atributos
$sxe = new SimpleXMLElement($xmlstr);

$movie = $sxe->addChild('movie');
$movie->addChild('title', 'JavaScript');

$movie->addChild('plot', 'Es el lenguaje más usado en front');

$characters = $movie->addChild('characters');
$character = $characters->addChild('character');
$character->addChild('name', 'Cliente');
$character->addChild('actor', 'Eli');

$character2 = $characters->addChild('chracter');
$character2->addChild('name', "Diseño");
$character2->addChild('actor', 'Ana');

$rating = $movie->addChild('rating', '3');
$rating->addAttribute('type', 'thumbs');

$rating2 = $movie->addChild('rating', '2');
$rating2->addAttribute('type', 'stars');

echo $sxe->asXML();
