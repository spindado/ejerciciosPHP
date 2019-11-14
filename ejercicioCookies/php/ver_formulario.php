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



    <?php
    echo <<< HDR
    
    <div class="container">
        <h1>Elige la preconfiguracion del usuario</h1>
        <form action="" method="">
            <fieldset>
                <label for="a">Languaje</label>
                <select name="lang" id="">
                    <option value="">es</option>
                    <option value="">ing</option>
                </select>
                <label for="b">Background-color</label>
                <select name="back-color" id="">
                    <option value="">white</option>
                    <option value="">green</option>
                    <option value="">black</option>
                    <option value="">red</option>
                </select>

                <label for="c">Font-color</label>
                <select name="font-color" id="">
                    <option value="">black</option>
                    <option value="">white</option>
                    <option value="">blue</option>
                </select>

                <input type="submit" value="Enviar">

            </fieldset>
        </form>

    </div>
HDR;
    ?>

</body>

</html>