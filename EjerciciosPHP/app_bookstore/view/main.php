<?php

session_start();

spl_autoload_register(function ($clase) {
    include_once "../" . str_replace("\\", "/", $clase) . ".php";
});

use model\lib\Customer;
use model\lib\Connection\Connection;

$instance = Connection::getInstance("../config_app.json");
$pdo = $instance->getConnector();

$customer = unserialize($_SESSION['customer']);
//echo $customer . "<br>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main-Bookstore</title>
</head>

<body>
    <h2>Home</h2>
    <form action="" method="post">
        <input type="submit" name="closeSession" value="Cerrar sesión">
    </form><br>

    <form action="" method="post">
        <input type="submit" name="insert" value="Insertar">
        <input type="submit" name="rent" value="Alquilar">
        <input type="submit" name="buy" value="Comprar">
        <input type="submit" name="return" value="Devolver alquiler">
        <input type="submit" name="delete" value="Eliminar">
        <input type="submit" name="see_borrowed" value="Ver alquilados">
    </form><br>

    <?php
    if(isset($_POST['closeSession'])) {
    /* Si el usuario ha cerrado la sesión */
    // Destruir todas las variables de sesión.
    $_SESSION = array();
    // Borrar la cookie de sesión.
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    //Cierra la sesión
    session_destroy();
    header('Location: ./login.php');

    } elseif (isset($_POST['insert'])) {
    /* Visualizar formulario para insertar un libro */
    ?>
        <form action="../controller/controller_main.php" method="post">
            <input type="text" name="isbn" placeholder="ISBN" required><br>
            <input type="text" name="title" placeholder="Título" required><br>
            <input type="text" name="author" placeholder="Autor" required><br>
            <input type="text" name="stock" placeholder="Stock" required><br>
            <input type="text" name="price" placeholder="Precio" required><br><br>
            <input type="submit" name="submit-insert" value="Enviar"><br>
        </form>
    <?php
    } elseif (isset($_POST['rent'])) {
    /* Visualizar todos los libros y formulario para alquilar */
        $titleRows = $customer->selectTitles($pdo);
        if(count($titleRows) == 0) {
            echo "<p>Aún no hay libros</p><br>";
        } else {
            foreach ($titleRows as $titleRow) {
                echo "<p>" . $titleRow['title'] . "</p>";
            }
        }
    ?>
        <form action="../controller/controller_main.php" method="post">
            <input type="text" name="title" placeholder="Título" required><br>
            <input type="submit" name="submit-rent" value="Enviar"><br>
        </form>
    <?php
    } elseif (isset($_POST['buy'])) {
    /* Visualizar todos los libros y formulario para comprar */
        $bookRows = $customer->selectBooks($pdo);
        if(!count($bookRows)) {
            echo "<p>Aún no hay libros</p><br>";
        } else {
    ?>
        <table>
            <tr>
                <th>ISBN</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Stock</th>
                <th>Precio</th>
            </tr>
    <?php
            foreach ($bookRows as $bookRow) {
                echo "<tr>";
                foreach ($bookRow as $key => $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
        }
    ?>
        </table><br><br>

        <form action="../controller/controller_main.php" method="post">
            <input type="number" name="amount" placeholder="Cantidad" min="1" max="20" required>
            <input type="text" name="title" placeholder="Título" required><br>
            <input type="submit" name="submit-buy" value="Enviar"><br>
        </form>
    <?php
    } elseif (isset($_POST['return'])) {
    /* Visualizar formulario para devolver un libro alquilado */
    ?>
        <form action="../controller/controller_main.php" method="post">
            <input type="text" name="title" placeholder="Título" required><br>
            <input type="submit" name="submit-return" value="Enviar"><br>
        </form>
    <?php
    } elseif (isset($_POST['delete'])) {
    /* Visualizar los libros y el formulario para eliminar un libro */
        $bookRows = $customer->selectBooks($pdo);
        if(!count($bookRows)) {
            echo "<p>Aún no hay libros</p><br>";
        } else {
    ?>
            <table>
                <tr>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Stock</th>
                    <th>Precio</th>
                </tr>
    <?php
                foreach ($bookRows as $bookRow) {
                    echo "<tr>";
                    foreach ($bookRow as $key => $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
        
    ?>
            </table><br><br>

            <form action="../controller/controller_main.php" method="post">
                <input type="text" id="title" name="title" placeholder="Título" required><br>
                <input type="submit" id="submit-delete" name="submit-delete" value="Enviar"><br>
            </form><br>
    <?php
        } //Ojo este cierre del else

    } elseif (isset($_POST['see_borrowed'])) {
    /* Visualizar los libros que tiene el usuario y que la fecha
        de devolución es null */
        // Obtengo el id del customer que está conectado
        $rowCustomerID = $customer->selectCustomerID($pdo, $customer->getEmail());
        $customerID = $rowCustomerID[0]['id'];
        // Obtengo todos los ID de libros que tiene alquilados el usuario
        $bookIDsRows = $customer->selectBookIDsFromBorrowed($pdo, $customerID);
        
        if (!count($bookIDsRows)) {
            echo "<p>No tienes ningún libro alquilado</p><br>";
        } else {
            echo "<h2>Libros alquilados</h2>";
            foreach ($bookIDsRows as $bookIDRow) {
               // Obtengo el título para visualizarlo
               $titleRows = $customer->selectTitlesBorrowed($pdo, $bookIDRow['book_id']);
               $title = $titleRows[0]['title'];
               echo "<p>$title</p>";
            }
        }
    } elseif (isset($_SESSION['cod'])) {
        echo $_SESSION['cod'];
        $_SESSION['cod'] = "";
    }
    ?>
</body>

</html>
