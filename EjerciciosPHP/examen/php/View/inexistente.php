<?php
$error = unserialize($_GET["error"]);
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
        echo "Error: " . $error->message . "<br>";
        echo "Code: " . $error->code . "<br>";
        echo "File: " . $error->file . "<br>";
        echo "Line: " . $error->line . "<br>";
    ?>
</body>
</html>