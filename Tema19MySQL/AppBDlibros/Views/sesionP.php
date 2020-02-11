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
    if (isset($_POST['insert'])){
        header('Location: ../modelos/customer.php');


    }else{
        echo <<< HDR
         <form action="$_SERVER[PHP_SELF]" method="post">
        <input type="submit" name="insert" value="Insertar">
        <input type="submit" name="alquilar" value="Alquilar">
        <input type="submit" name="" value="Comprar">
        <input type="submit" name="" value="Devolver">
        <input type="submit" name="" value="Eliminar">
    </form>
HDR;
    }
    if(isset($_POST['alquilar'])){
        header('Location: ../modelos/customer.php');
    }

    ?>

</body>

</html>