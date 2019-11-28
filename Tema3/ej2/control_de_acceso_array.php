<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <title>Ejercicio2</title>
  </head>
  <body>
    <?php
   
  

    $users = ["jose@gmail.com" => "Pepe", "123456"];
    $users = ["angel@gmail.com" => "Angel","123"];
    if(isset($_POST['submit'])){
            if(isset($_POST['name'] )){
              echo $users[];
            }else{
            echo "Acceso denegado";
            }
    }else{
        echo       <<<HRD
      <form action="$_SERVER[PHP_SELF]" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="" />
        <label for="pass">Password: </label><input type="password" name="pass" />
        <input type="submit" value="submit" name="submit"/>
      </form>
      <a name="" id="" class="btn btn-primary" href="#" role="button">Back</a>
HRD;
            }
       

        

?>
  </body>

</html>
