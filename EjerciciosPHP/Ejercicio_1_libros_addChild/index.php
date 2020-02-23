<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: repeat(4, 25%);
            justify-items: center;
        }
    </style>
</head>

<body>

    El siguiente ejercicio:
    <br>
    1. Lee los libros de la BBDD
    <br>
    2. Transforma el array obtenido de la BBDD en un XML
    <br>
    3. Añade los datos del formulario en el XML generado
    <br>
    4. Comprueba si existe el fichero xml:
    <br>
    -si no existe, se crea a partir de la consulta a la BBDD
    <br>
    - si existe se añade el dato en el fichero creado anteriormente
    <br>
    5. Permite cambiar el título de un libro por otro en un XML
    <br>
    <div class="container">

        <form action='controlXML.php' method='post'>
            id<input type="text" name="id"><br>
            isbn <input type="text" name="isbn"><br>
            título<input type="text" name="title"><br>
            author<input type="text" name="author"><br>
            stock<input type="text" name="stock"><br>
            precio<input type="text" name="price"><br>

            <input type="submit" name="submit">
        </form>

        <form action='controlXML.php' method='post'>
            título antiguo<input type="text" name="old"><br>
            título nuevo<input type="text" name="new"><br>
            <input type="submit" name="submit2">
        </form>

        <form action='controlXML.php' method='post'>
            título que desea borrar<input type="text" name="delete"><br>
            <input type="submit" name="submit3">
        </form>

        <form action='controlXML.php' method='post'>
            id<input type="text" name="id"><br>
            isbn <input type="text" name="isbn"><br>
            título<input type="text" name="title"><br>
            author<input type="text" name="author"><br>
            stock<input type="text" name="stock"><br>
            precio<input type="text" name="price"><br>
            <input type="submit" name="submit4">
        </form>
    </div>
</body>

</html>