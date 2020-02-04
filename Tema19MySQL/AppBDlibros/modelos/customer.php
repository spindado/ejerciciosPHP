<?php 


if(isset($_POST['insertLibro'])){
        $id = $_POST['id'];
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $sql = "INSERT INTO book (id, isbn, title, author, stock, price)
VALUES ('$id', '$isbn', '$title,','$author','100','50')";

    }

?>