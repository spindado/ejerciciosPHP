<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";


if(isset($_POST['insert'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = rand(1111111111111,9999999999999);
    $stock = rand(1,100);
    $price = rand(1,100);


    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO book (isbn, title, author, stock, price)
    VALUES ('$isbn', '$title','$author','$stock','$price')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully <br>";
    echo <<< HDR
        <button type="submit">
            <a href="../Views/sesionP.php">Volver</a>
        </button>
HDR;
    
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
        <button type="submit">
            <a href="../Views/sesionP.php">Volver</a>
        </button>
    </form>

HDR;

}*/
if(isset($_POST['alquilar'])){
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

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
}
?>