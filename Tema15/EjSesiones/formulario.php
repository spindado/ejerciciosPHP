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
    
    session_start();
    if(isset($_POST['submit'])){
        if (!isset($_SESSION['username'])){//¿No está ya acreditado?

    if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){//¿Ha rellenado el formulario?
        if($_REQUEST['username']=='juanfe' && $_REQUEST['password']='secreto'){//Son correctas las credenciales
            $_SESSION['username']=$_REQUEST['username'];
            header('Location: sesion.php');
        }else{ //No son correctas las credenciales
            header('Location: formulario.php');
        }
    }
}else{//Sí está ya acreditado
    header('Location: informacion.php');
}
        $name = $_POST['firstname'];
        $Lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $lang = $_POST['language'];
        echo "Nombre: " . $name . " " . $Lname . "<br>";
        echo "Genero: " . $gender . "<br>";
        echo "Idiomas que hablas: " . implode(" ",$lang) . "<br>";
        echo '<button><a href="./formulario.php">Return</a></button>';

    }else{
        //pintar el formulario con una funcion
        echo <<< HDR
        <form action="$_SERVER[PHP_SELF]" method="post" enctype="multipart/form-data" autocomplete="on">
            <fieldset>
                <legend>Personal information:</legend>
                <label for="id_firstname">First Name: </label>
                <input type="text" id="id_firstname" name="firstname" value="" placeholder="Jhon"><br>
                <label for="id_lastname">Last Name: </label>
                <input type="text" id="id_lastname" name="lastname" value="" placeholder="Banacafalata"><br>
                <label for="id_userName">User Name:</label>
                <input type="text" name="username" id="id_username"><br>
                <label for="id_pass">Password:</label>
                <input type="password" name="password" id="id_pass"><br><br>
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female <br><br>
                <input type="checkbox" name="language[]" value="English">English
                <input type="checkbox" name="language[]" value="French">French
                <input type="checkbox" name="language[]" value="German">German
                <input type="checkbox" name="language[]" value="Chinese">Chinese
                <input type="checkbox" name="language[]" value="Spanish">Spanish <br><br>
                
                <input type="submit" name="submit" value="Sign In">
            </fieldset>
        </form>

HDR;
    }
    ?>


</body>

</html>