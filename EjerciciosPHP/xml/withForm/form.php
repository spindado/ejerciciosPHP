<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="Author" placeholder="Autor" required><br/>
        <input type="text" name="Title" placeholder="Title" required><br/>
        <select name="Genre" required>
            <option value="adventure" selected></option>
            <option value="fantasy"></option>
            <option value="comedia"></option>
            <option value="drama"></option>
        </select><br/>
        <input type="number" name="Price" min="0" step=".01" placeholder="Precio" required><br/>
        <input type="date" name="PublishDate" placeholder="Fecha"><br/>
        <textarea name="Description" id="" cols="30" rows="10" placeholder="Descripción"></textarea><br/>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>