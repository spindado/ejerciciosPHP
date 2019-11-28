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

if(isset($_POST['submit'])){
    
    if(is_uploaded_file($_FILES['image']['tmp_name'])){
        $namedir = "../images";
        $namefich = $_FILES['image']['name'];
        if (is_dir($namedir)){
            $idUnico = date("d.m.Y-").time();
            $namefich = $idUnico."-".$namefich;
            $namecomp = "../images".$namedir.$namefich;
            if($_FILES['image']['type'] == "image/gif" OR $_FILES['image']['type'] == "image/jpeg"){
                move_uploaded_file (($_FILES['image']['tmp_name']), $namecomp);
                echo $_FILES['image']['name']."<br>"; 
                echo "tmp_name:".$_FILES['image']['tmp_name']."<br>";
                echo "size:".$_FILES['image']['size']."<br>";
                echo "type:".$_FILES['image']['type']."<br>";
                echo "Fichero subido con el nombre: $namefich<br>";
            }else{
                echo "El archivo tiene que ser JPG o GIF. Otros archivos no estan permitidos";
            }
            
        }else{
            echo "Directorio definitivo inválido";
        }   
    }else{
        echo "no se ha podido subir el fichero";
    }
}else{
    echo <<< HDR
<form action="$_SERVER[PHP_SELF]" method="post" enctype="multipart/form-data">

<input type="file" name="image" id=""> <br>
<input type="submit" name="submit" value="submit">


</form>


HDR;

}

    
//primero ver si me sube una imagen sin problema;

?>

</body>

</html>