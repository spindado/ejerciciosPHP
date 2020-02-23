<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login-Bookstore</title>
</head>
<body>
    <h2>Login</h2>
    <form action="../index.php" method="post">
        <input type="email" name="user" placeholder="Usuario" required>
        <br>
        <input type="password" name="password" placeholder="Contraseña" required>
        <br>
        <input type="radio" name="type" value="premium">Premium
        <input type="radio" name="type" value="basic" checked>Basic
        <br>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>