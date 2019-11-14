<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Document</title>
</head>


<body>


    <div class="container">
        <h1>Elige la preconfiguracion del usuario</h1>
        <form action="setcookies.php" method="post">
            <fieldset>
                <label for="">Languaje</label>
                <select name="lang" id="">
                    <option value="es">es</option>
                    <option value="ing">ing</option>
                </select>
                <label for="">Background-color</label>
                <select name="back-color" id="">
                    <option value="white">white</option>
                    <option value="green">green</option>
                    <option value="black">black</option>
                    <option value="red">red</option>
                </select>

                <label for="">Font-color</label>
                <select name="font-color" id="">
                    <option value="black">black</option>
                    <option value="white">white</option>
                    <option value="blue">blue</option>
                </select>

                <input type="submit" name="submit" value="Enviar">

            </fieldset>
        </form>

    </div>
    <?php
    echo <<< HDR
    
HDR;
    ?>

</body>

</html>