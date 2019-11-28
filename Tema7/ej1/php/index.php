<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Document</title>
</head>

<body>

    <form action="$_SERVER[PHP_SELF]" method="post">
        <div id="toolBar1">
            <select>
                <option class="heading" selected>- color -</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="black">Black</option>
            </select>
            <select>
                <option class="heading" selected>- background -</option>
                <option value="red">Red</option>
                <option value="green">Green</option>
                <option value="black">Black</option>
            </select>
        </div>

        <div class="textBox" contenteditable="true">
            <p>Lorem ipsum</p>
        </div>
        <button type="reset">Reset</button>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        echo "eureka";
        echo "<a href='./index.php' class='btn btn-primary active' role='button'>BACK</a>";
    } else {
        echo <<<HDR
       

HDR;
    }


    ?>



</body>

</html>