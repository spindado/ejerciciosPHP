<?php
/*$array = ['cadena' => 'Hello world!'];
echo json_encode($array);*/
echo "Hello world!";

if(isset($_GET['objeto'])) {
    echo "get";
    echo $_GET['objeto'];
} elseif (isset($_POST['objeto'])) {
    echo "post";
    echo $_POST['objeto'];
} else {
    echo "else";
}