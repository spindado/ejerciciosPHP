<?php 
//usando atributos
/** solo hemos cubierto la parte de leer los nombres de los elementos y
 *  sus valores. SimpleXML también puede acceder a los atributos
 *  de los elementos.
 *  Acceder a los atributos de un elemento
 *  es como acceder a los elementos de una array.*/
include 'ejemplo.php';
$xml = simplexml_load_string($xmlstr);
/**Accede a los nodos <rating> de la primera pelicula
 * Output the rating scale, too */
foreach ($$xml->movie[0]->rating as $rating) {
    switch((string)$rating['type']){
        case 'thumbs':
            echo $rating, ' thumbs up';
        break;
        case 'stars':
            echo $rating, ' stars';
        break;
    }
}
?>