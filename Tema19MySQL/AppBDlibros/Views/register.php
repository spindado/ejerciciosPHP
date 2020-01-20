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
    if(isset($_POST['name']) && isset($_POST['lname'])){
        if($_POST['name'] === $_POST['uname'] && isset($_POST['pass'])){
            header('Location: login.php');
        }
        
    }else{
        echo <<< HDR
        <div id="login-form">
        <form action="$_SERVER[PHP_SELF]" method="post">
            <table>
                <tr>
                    <td>
                        <input type="text" name="name" placeholder="Name" require />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="lname" placeholder="Last Name" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="uname" placeholder="User Name" require />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="pass" placeholder="Your Password" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="btn-signup">Register</button>
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