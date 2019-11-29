<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="$_SERVER[PHP_SELF]" method="post" enctype="multipart/form-data" autocomplete="on">
        <fieldset>
            <legend>Personal information:</legend>
            First name:<br>
            <input type="text" name="firstname" value="" placeholder="Jhon"><br>
            Last name:<br>
            <input type="text" name="lastname" value="" placeholder="Banacafalata"><br><br>
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female <br><br>
            <input type="checkbox" name="language[]" value="English">English
            <input type="checkbox" name="language[]" value="French">French
            <input type="checkbox" name="language[]" value="German">German
            <input type="checkbox" name="language[]" value="Chinese">Chinese
            <input type="checkbox" name="language[]" value="Spanish">Spanish <br><br>
            <input type="file" name="image"> <br><br>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>

</body>

</html>