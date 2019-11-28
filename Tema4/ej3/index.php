<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>

    <?php

    if(isset($_POST['submit'])){
        $name = $_POST['firstname'];
        $Lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $lang = $_POST['language'];    
        
        if(is_uploaded_file($_FILES['image']['tmp_name'])){
            $namedir = "../images";
            if(is_dir($namedir)){
                $idUnico = date("d.m.Y-").time();
                $name = $_POST['firstname'];
                $namefich = $idUnico . $name . $_FILES['image']['name'];
                $namecomp = "../images" . $namedir . $namefich;
                move_uploaded_file(($_FILES['image']['tmp_name']),$namecomp);
            }            
            
        }else{
            
            echo"no has subido una foto";
        }
        
        echo "Nombre: " . $name . " " . $Lname . "<br>";
        echo "Genero: " . $gender . "<br>";
        echo "Idiomas que hablas: " . implode(" ",$lang) . "<br>";
        echo "<img style='width: 30%;' src='".$namecomp."'/>";

    }else{
        echo <<< HDR

        <form action="$_SERVER[PHP_SELF]" method="post" enctype="multipart/form-data" autocomplete="on">
        <fieldset>
        <legend>Personal information:</legend>
        First name:<br>
        <input type="text" name="firstname" value="" placeholder="Jhon"><br>
        Last name:<br>
        <input type="text" name="lastname" value="" placeholder="Banacafalata"><br><br>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female <br><br>
        <input type="checkbox" name="language[]" value="English">English
        <input type="checkbox" name="language[]" value="French">French
        <input type="checkbox" name="language[]" value="German">German 
        <input type="checkbox" name="language[]" value="Chinese">Chinese 
        <input type="checkbox" name="language[]" value="Spanish">Spanish <br><br> 
        <input type="file" name="image"> <br><br>
        <input type="submit" name="submit" value="Submit">
        </fieldset>
        </form>
HDR;
    }


?>


</body>

</html>