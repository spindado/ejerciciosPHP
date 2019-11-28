<?php

$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

function generate_string($input, $strength = 5)
{
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}

$string_length = 5;
$captcha_string = generate_string($permitted_chars, $string_length);

/**-------------------------- */

$archivo = "images/fondoheader.jpg";
$imagen = imagecreatefromjpeg($archivo);
$tamaño = 30;
$min_x = 5;
$max_x = 10;
$x = random_int($min_x, $max_x);
$min_y = 30;
$max_y = 50;
$y = random_int($min_y, $max_y);
$texto = $captcha_string;
$longitud_texto = strlen($texto);
for ($i = 0; $i < $longitud_texto; $i++) {
    $char = $texto[$i];
    $angulo = random_int(0, 100);
    $fuente = realpath("fuentes/OpenSans-Regular.ttf");
    $color = imagecolorallocate($imagen, 255, 0, 0);

    $imgText = imagefttext($imagen, $tamaño, $angulo, $x, $y, $color, $fuente, $char);

    $min_y = $max_y;
    $max_y = $max_y + 10;
    $y = random_int($min_y, $max_y);

    $min_x = $max_x;
    $max_x = $max_x + 45;
    $x = random_int($min_x, $max_x);
}


header("Content-Type: image/jpeg");
imagejpeg($imagen);
imagedestroy($imagen);