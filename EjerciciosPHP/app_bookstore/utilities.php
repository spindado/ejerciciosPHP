<?php
function checkInput($var) {
    if (!isset($var)) {
        throw new \Exception('No existe la variable');
    }
    $var = strip_tags($var); //Elimina etiquetas HTML y PHP
    //$var = htmlentities($var);
    $var = htmlspecialchars($var, ENT_QUOTES, "UTF-8"); //Convierte caracteres especiales en entidades HTML
    $var = trim($var); //Elimina espacios que haya al principio y al final
    if (!$var) {
        throw new \Exception('No ha rellenado el campo');
    }
    return $var;
}
