<?php 
//Usando XPATH
/**SimpleXML incluye soporte nativo de Xpath.
 * Para encontrar todos los elementos <charecter>
 */
include 'ejemplo.php';
$xml = simplexml_load_string($xmlstr);

foreach ($xml->xpath('//character') as $character) {
    echo $character->name, 'played by ',$character->actor, '<br/>';
    
}

?>