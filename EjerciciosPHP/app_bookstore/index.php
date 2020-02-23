<?php

session_start();

spl_autoload_register(function ($clase) {
    include_once str_replace("\\", "/", $clase) . ".php";
});

use model\lib\Customer;
use model\lib\Connection\Connection;

$instance = Connection::getInstance("./config_app.json");
$pdo = $instance->getConnector();

if(isset($_POST['submit'])) {
    // Si entra por el login.php, creo el objeto Customer
    $customer = new Customer($_POST['user'], md5($_POST['password']));
    // Obtengo todos los emails de la tabla customer
    $emailsRows = $customer->selectEmails($pdo);
    // Compruebo si ha devuelto filas
    if(count($emailsRows) == 0) {
        // Si no devuelve, le redirijo a register.php
        header('Location: ./view/register.php');
    } else {
        // Si devuelve filas, compruebo si el customer está registrado
        $equalEmail = $customer->equalEmail($emailsRows);
        if($equalEmail) {
            // Si está registrado, obtengo la contraseña del usuario registrado
            $passwordRows = $customer->selectPassword($pdo, $customer->getEmail());
            // Compruebo si la contraseña que ha introducido es correcta
            $equalPassword = $customer->equalPassword($passwordRows[0]);
            if($equalPassword) {
                // Serializo el objeto customer
                $_SESSION['customer'] = serialize($customer);
                // Si es correcta le redirijo a main.php
                header('Location: ./view/main.php');
            } else {
                // Si no es correcta le redirijo a login.php con mensaje de que ha introducido mal la contraseña
                header("Refresh: 2; url=./view/login.php");
                echo "<p>La contraseña introducida es incorrecta</p><br>";
            }
        } else {
            // Si no está registrado, le redirijo a register.php
            header("Refresh: 2; url=./view/register.php");
            echo "<p>El usuario no está registrado</p><br>";
        }
    }
} elseif(isset($_POST['submit-register'])) {
    // Si viene de register.php, creo el objeto customer
    $customer = new Customer($_POST['user'], md5($_POST['password']), $_POST['firstname'], $_POST['surname'], $_POST['type']);
    // Lo serializo para poder usarlo en la sesión
    $_SESSION['customer'] = serialize($customer);
    // Inserto fila en la tabla customer.
    $insert = $customer->insertCustomer($pdo);

    if($insert) {
        // Si se ha insertado la fila le redirijo a sendMail.php para que le envie un email de bienvenida
        header('Location: ./sendMail.php');
        // Si se ha insertado la fila le redirijo a main.php
        //header('Location: ./view/main.php');
    } else {
        // Sino le vuelvo a redirigir a register.php
        header("Refresh: 2; url=./view/register.php");
        echo "<p>No se ha podido guardar el usuario</p><br>";
    }
} else {
    // Si no se ha logueado, le redirijo a login.php
    header('Location: ./view/login.php');
}