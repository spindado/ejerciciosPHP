<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    /*date_default_timezone_set('Europe/Madrid');
    $today = new DateTime();
    $today = date_format($today, 'd/m/Y H:i:s');
    setcookie('Fecha', $today);*/
    setcookie('Fecha', date('d.m.Y H:i:s'), time() + 3600);
    setcookie('Preferencias[idioma]', 'español');
    setcookie('preferencias[fondo]', 'rojo');

    ?>

</body>

</html>