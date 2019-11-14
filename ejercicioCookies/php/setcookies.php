<?php

if (isset($_POST['submit'])) {;
    var_dump($_POST);

    setcookie('preferencias["idioma"]', $_POST['lang']);
    setcookie('preferencias["fuente"]', $_POST['color_fuente']);
    setcookie('preferencias["fondo"]', $_POST['color_fondo']);
} else {
    echo "No coge las cookies";
}
/**
 * setcookie('Fecha', date('d.m.Y H:i:s'), time() + 3600);
 * setcookie('Preferencias[idioma]', 'español');
 * setcookie('preferencias[fondo]', 'rojo');
 */