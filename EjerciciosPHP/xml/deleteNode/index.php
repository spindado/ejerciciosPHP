<?php

$file = 'catalog.xml';

if (file_exists($file)) {
    $xmlFile = simplexml_load_file($file);
} else {
    exit('Error al abrir ' . $file);
}

function getNode($xmlFile) {
    foreach ($xmlFile->children() as $value) {
        if ($value['id'] == 'bk102') {
            return $value;
        }
    }
}

function deleteNodeXPath($xmlFile) {
    foreach ($xmlFile->xpath("//Book[@id='bk105']") as $book) {
        $dom = dom_import_simplexml($book);
        $dom->parentNode->removeChild($dom);
    }
}

/*$sxe = getNode($xmlFile);
$dom = dom_import_simplexml($sxe);
$dom->parentNode->removeChild($dom);
*/

deleteNodeXPath($xmlFile);
echo $xmlFile->asXML($file);
