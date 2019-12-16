<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Document</title>
</head>

<body>
    <?php
    session_start(); 
    if(!isset($_SESSION['uname'])){
        if(isset($_REQUEST['uname']) && isset($_REQUEST['pass'])){
            if($_REQUEST['uname'] == 'juanfe' && $_REQUEST['clave'] = '123456'){
                $_SESSION['uname'] = $_REQUEST['uname'];
                header('Location: sesion.php');
            }else{
                header('Location: registro.php');
            }
        }else{
            echo <<< HDR

            <div id="login-form">
                <form action="$_SERVER[PHP_SELF]" method="post">
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="Fname" placeholder="First Name" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="Lname" placeholder="Last Name" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="date" name="age" class="age">
                            </td>
                        </tr>
            
                        <tr>
                            <td>
                                <label for="">Gender:</label><br>
                                <label for="">Male</label>
                                <input type="radio" name="gender" class="radio">
                                <label for="">Female</label>
                                <input type="radio" name="gender" class="radio">
                                <label for="">Other</label>
                                <input type="radio" name="gender" class="radio">
                            </td>
            
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
    }else{
        header('Location: sesion.php');
    }
    ?>

</body>

</html>