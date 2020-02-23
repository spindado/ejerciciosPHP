<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register-Bookstore</title>
</head>
<body>
    <h2>Registro</h2>
    <form action="../index.php" method="post">
        <input type="text" name="firstname" placeholder="Nombre" required>
        <br>
        <input type="text" name="surname" placeholder="Apellido" required>
        <br>
        <input type="email" name="user" placeholder="E-mail" required>
        <br>
        <input type="password" name="password" placeholder="Contraseña" required>
        <br>
        <input type="radio" name="type" value="premium">Premium
        <input type="radio" name="type" value="basic" checked>Basic
        <br>
        <input type="submit" name="submit-register" value="Enviar">
    </form>
</body>
</html>