<?php 
//usando plot

include 'ejemplo.php';

$xml = simplexml_load_string($xmlstr);

echo $xml->movie[0]->plot;

?>