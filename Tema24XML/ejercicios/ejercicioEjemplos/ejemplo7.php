<?php 
//Interoperabilidad con DOM
/**PHP tiene un mecanismo para convertir nodos XML
 * entre los formatos de SimpleXML y DOM.
 * Este ejemplo muestra como se podria cambiar un elemento
 * DOM a otro SimpleXML
 */
$dom = new domDocument;
$dom->loadXML('<books><book><title>blah</title></book></books>');
if(!$dom){
    echo 'Error al parsear el documento';
    exit;
}
$s = simplexml_import_dom($dom);
echo $s->book[0]->title;

?>