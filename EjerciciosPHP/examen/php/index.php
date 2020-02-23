<?php require "./Model/Connection.php"?>
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
        $path = "../conf/config.json";
        $con = new Connection($path);
        $sql = "../sql/viviendas.sql";
        $pdo = $con->createDB($sql, $path);
    ?>

    <form action="./Controller/UsuariosController.php" method="POST">
        <input type="text" name="user" id="" placeholder="user">
        <input type="password" name="password" id="" placeholder="password">
        <input type="submit" value="Submit" name="submit">
    </form>

</body>
</html>