<?php 
spl_autoload_register(function ($className){
    include __DIR__ . '/class' . $className . '.php' ;
});
?>
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
    $header = new MiCabecera("Esto es un header");
    echo $header;
?>

</body>

</html>