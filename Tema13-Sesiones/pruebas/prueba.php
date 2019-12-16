<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Server Side Form validations Using PHP</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <style type="text/css">
    <?php if(isset($_POST['btn-signup'])) {
        $uname=trim($_POST['uname']);
        $email=trim($_POST['email']);
        $upass=trim($_POST['pass']);

        if(empty($uname)) {
            $error="enter your name !";
            $code=1;
        }

        else if( !ctype_alpha($uname)) {
            $error="letters only !";
            $code=1;
        }

        else if(empty($email)) {
            $error="enter your email !";
            $code=2;
        }

        else if( !preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)) {
            $error="not valid email !";
            $code=2;
        }

        else if(empty($upass)) {
            $error="enter password !";
            $code=3;
        }

        else if(strlen($upass) < 8) {
            $error="Minimum 8 characters !";
            $code=3;
        }


    }

    ?><?php if(isset($error) && $code==1) {
        ?>input.error {
            border: solid red 1px;
        }

        <?php
    }

    elseif (isset($error) && $code==2) {}

    ?>
    </style>
</head>

<body>
    <center>
        <div id="login-form">
            <form method="post">
                <table align="center" width="30%" border="0">
                    <?php
if(isset($error))
{
 ?>
                    <tr>
                        <td id="error"><?php echo $error; ?></td>
                    </tr>
                    <?php
}
?>
                    <tr>
                        <td><input class="error" type="text" name="uname" placeholder="User Name"
                                value="<?php if(isset($uname)){echo $uname;} ?>"
                                <?php if(isset($code) && $code == 1)  ?> /></td>
                    </tr>
                    <tr>
                        <td><input class="error" type="text" name="email" placeholder="Your Email"
                                value="<?php if(isset($email)){echo $email;} ?>"
                                <?php if(isset($code) && $code == 2)  ?> /></td>
                    </tr>
                    <tr>
                        <td><input class="error" type="password" name="pass" placeholder="Your Password"
                                <?php if(isset($code) && $code == 3)?> /></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="btn-signup">Sign Me Up</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
</body>

</html>