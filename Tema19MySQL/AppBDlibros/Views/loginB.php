<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>

    <?php 
        if (isset($_POST['uname']) && isset($_POST['pass'])){
            if ($_POST['uname'] == 'pepe' && $_POST['pass'] == '123'){
                $uname = $_POST['uname'];
                //meterse en la sesion logueada para añadir libros etcetc
                echo "Buenos dias $uname";
            }else{
                header('Location: register.php');
            }
        }else{
            echo <<< HDR
            <h1> SIGN IN BASIC </h1>
               
            <div id="login-form">
            <form action="$_SERVER[PHP_SELF]" method="post">
                <table>
                    <tr>
                        <td>
                            <input type="text" name="uname" placeholder="User Name" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="pass" placeholder="Your Password" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="btn-signup">Sign Me Up</button>
                        </td>
                    </tr>
    
    
                </table>
            </form>
        </div>
            
HDR;

        }
        
    
    ?>

</body>

</html>