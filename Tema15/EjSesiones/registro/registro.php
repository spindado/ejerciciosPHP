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
    <div id="login-form">
        <form action="$_SERVER[PHP_SELF]" method="post">
            <table>
                <tr>
                    <td>
                        <input type="text" name="uname" placeholder="First Name" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="uname" placeholder="Last Name" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="date" name="age" class="age">
                    </td>
                </tr>

                <tr>
                    <td class="radio">
                        <label for="">Sexo:</label><br>
                        <label for="">Masculino</label>
                        <input type="radio" name="gender" class="radio">
                        <label for="">Femenino</label>
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

</body>

</html>