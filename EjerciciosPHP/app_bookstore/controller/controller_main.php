<?php

session_start();
spl_autoload_register(function ($clase) {
    include_once "../" . str_replace("\\", "/", $clase) . ".php";
});

use model\lib\{Book, Customer};
use model\lib\Connection\Connection;

require("../utilities.php");

$instance = Connection::getInstance("../config_app.json");
$pdo = $instance->getConnector();

$customer = unserialize($_SESSION['customer']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>controller-main-Bookstore</title>
</head>

<body>
    <?php
    if (isset($_POST['submit-insert'])) {
    /* Insertar un libro */
        try {
            // Controlo entrada de datos
            $isbn = checkInput($_POST['isbn']);
            $title = checkInput($_POST['title']);
            $author = checkInput($_POST['author']);
            $stock = checkInput($_POST['stock']);
            $price = checkInput($_POST['price']);
            // Compruebo si el libro ya existe
            $titles = $customer->selectTitles($pdo);
            $customer->checkTitleExists($title, $titles);
            // Creo el objeto libro
            $book = new Book($isbn, $title, $author, $stock, $price);
            // Inserto una fila en la tabla book
            $customer->insertBook($pdo, $book);
            $_SESSION['cod'] = "<p>El libro se ha guardado</p><br>";
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $_SESSION['cod'] = "<p>$message<br>";
        }
    } elseif (isset($_POST['submit-rent'])) {
    /* Alquilar un libro */
        try {
            // Obtengo el id del customer que está conectado
            $customerID = $customer->selectCustomerID($pdo, $customer->getEmail());
            /// Controlo entrada de datos
            $title = checkInput($_POST['title']);
            // Obtengo el id del libro para alquilar
            $bookID = $customer->selectBookID($pdo, $title);
            // Compruebo si hay stock disponible, si no hay salta una Exception
            $availableStock = $customer->selectAvailableStock($pdo, $bookID[0]['id']);
            if(intval($availableStock[0]['available_stock'])-1 < 0) {
                throw new \Exception('No hay stock disponible');
            }
            // Obtengo la fecha actual en la que lo alquila
            $start = new DateTime();
            // Inserto la fila en la tabla borrowed_books
            $customer->insertBorrowedBooks($pdo, $customerID[0]['id'], $bookID[0]['id'], $start->format('Y-m-d H:i:s'));
            $_SESSION['cod'] = "<p>Has alquilado el libro</p><br>";
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $_SESSION['cod'] = "<p>$message</p><br>";
        }

    } elseif (isset($_POST['submit-buy'])) {
    /* Comprar un libro */
        // Obtengo el id del customer que está conectado
        $customerID = $customer->selectCustomerID($pdo, $customer->getEmail());
        // Obtengo la fecha actual en la que lo compra
        $dateSale = new DateTime();
        try {
            // Inserto la fila en la tabla sale
            $customer->insertSale($pdo, $customerID[0]['id'], $dateSale->format('Y-m-d H:i:s'));
            // Controlo entrada de datos
            $title = checkInput($_POST['title']);
            // Obtengo el id del libro para comprar
            $bookID = $customer->selectBookID($pdo, $title);
            // Obtengo el id de la compra
            $saleID = $customer->selectSaleID($pdo, $customerID[0]['id'], $dateSale->format('Y-m-d H:i:s'));
            // Obtengo la cantidad de libros que quiere comprar
            $amount = checkInput($_POST['amount']);
            // Compruebo si hay stock disponible, si no hay salta una Exception
            $availableStock = $customer->selectAvailableStock($pdo, $bookID[0]['id']);
            $result = intval($availableStock[0]['available_stock'])-$amount;
            if($result < 0) {
                throw new \Exception('No hay stock disponible');
            }
            // Inserto la fila en la tabla sale_book
            $customer->insertSaleBook($pdo, $bookID[0]['id'], $saleID[0]['id'], $amount);
            $_SESSION['cod'] = "<p>Se ha comprado del libro</p><br>";
            // Actualizo el stock disponible del libro
            $stock = $customer->selectStock($pdo, $bookID[0]['id']);
            $newStock = intval($stock[0]['stock'])-$amount;
            $customer->updateStock($pdo, $newStock, $bookID[0]['id']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $_SESSION['cod'] = "<p>$message</p><br>";
        }

    } elseif (isset($_POST['submit-return'])) {
    /* Devolver un libro alquilado */
        // Obtengo el id del customer que está conectado
        $customerID = $customer->selectCustomerID($pdo, $customer->getEmail());
        try {
            // Controlo entrada de datos
            $title = checkInput($_POST['title']);
            // Obtengo el id del libro para devolver
            //$bookID = $customer->selectBookID($pdo, $title);
            $bookID = $customer->selectIDBookFromBorrowed($pdo, $title, $customerID[0]['id']);
            if (!count($bookID)) {
                throw new \Exception('El título no se corresponde con tus libros alquilados');
            }
            // Obtengo la fecha actual en la que lo devuelve
            $end = new DateTime();
            $customer->updateBorrowedBooks($pdo, $end->format('Y-m-d H:i:s'), $customerID[0]['id'], $bookID[0]['id']);
            $_SESSION['cod'] = "<p>Se ha devuelto el libro alquilado</p><br>";
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $_SESSION['cod'] = "<p>$message</p><br>";
        }
    } elseif (isset($_POST['submit-delete'])) {
    /* Eliminar un libro */
        try {
            // Controlo entrada de datos
            $title = checkInput($_POST['title']);
            // Obtengo la id del libro
            $bookID = $customer->selectBookID($pdo, $title);
            if (!count($bookID)) {
                throw new \Exception('El título no se corresponde con ningún libro');
            }
            // Borro el libro
            $customer->deleteBook($pdo, $bookID[0]['id']);
            $_SESSION['cod'] = "<p>El libro se ha eliminado</p><br>";
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $_SESSION['cod'] = "<p>$message</p><br>";
        }
    }
    header('Location: ../view/main.php');
    ?>
</body>

</html>