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
    if(isset($_POST['btn-signupP']) || isset($_POST['btn-signupB'])){
        if(isset($_POST['btn-signupP'])){
            header('Location: login.php');
        }else{
            header('Location: loginB.php');
        }
        
    }else{
        echo <<< HDR
        <div id="login-form">
        <form action="$_SERVER[PHP_SELF]" method="post">
            <table>
                <tr>
                    <td>
                        <button class="btn-premium" type="submit" name="btn-signupP">Premium</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="btn-signupB">Basic</button>
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