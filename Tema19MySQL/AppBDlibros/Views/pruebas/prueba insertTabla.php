<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";


if(isset($_POST['insert'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $id = rand(1,9999999999);
    $isbn = rand(1111111111111,9999999999999);


    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO book (isbn, title, author, stock, price)
    VALUES ('$isbn', '$title','$author','50','20')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}else{
    echo <<< HDR
    <form action="" method="post">
        <label for="title">titulo:</label>
        <input type="text" name="title"><br>
        <label for="author">autor:</label>
        <input type="text" name="author"><br>
        <input type="submit" name="insert" value="insertar">
    </form>

HDR;

}


?>