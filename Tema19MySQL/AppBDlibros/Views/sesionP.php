<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php 
    if (isset($_POST['insert'])){
        echo <<< HDR

    <form action="$_SERVER[PHP_SELF]" method="post">
        <label for="id">id:</label>
        <input type="text" name="id"><br>
        <label for="isbn">isbn:</label>
        <input type="text" name="isbn"><br>
        <label for="title">titulo:</label>
        <input type="text" name="title"><br>
        <label for="author">autor:</label>
        <input type="text" name="author"><br>
        <input type="submit" name="insertL" value="Insertar">
    </form>

HDR;
        if(isset($_POST['insertL'])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bookstore";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $id = $_POST['id'];
            $isbn = $_POST['isbn'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $sql = "INSERT INTO book (id, isbn, title, author, stock, price)
            VALUES ('$id', '$isbn', '$title,','$author','100','50')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            
        }

    }else{
        echo <<< HDR
         <form action="$_SERVER[PHP_SELF]" method="post">
        <input type="submit" name="insert" value="Insertar">
        <input type="submit" name="" value="Alquilar">
        <input type="submit" name="" value="Comprar">
        <input type="submit" name="" value="Devolver">
        <input type="submit" name="" value="Eliminar">
    </form>
HDR;
    }



    ?>

</body>

</html>