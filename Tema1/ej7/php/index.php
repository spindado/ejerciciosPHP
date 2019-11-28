<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>Ejercicio 7</title>
</head>
<body>  
     <?php
        
        $words['surgir'] = array ("arise","arose","arisen");
        $words['despertar'] = array ("awake","awoke","awoken");
        $words['despertar(se)'] = array ("bear","bore","borne");
        $words['golpear'] = array ("beat","beat","beaten");
        $words['empezar'] = array ("begin","began","begun");
        $words['morder'] = array ("bite","bit","bitten");
        $words['estallar'] = array ("burst","burst","burst");
        $words['venir'] = array ("come","came","come");
        $words['beber'] = array ("drink","drank","drunk");
        $words['comer'] = array ("eat","ate","eaten");

        $var=$_REQUEST["Español"];

        if($_var){
            
        }           
        ?>
        
        <form action="" method="post">
            Español<input type="text" name="Español" id="">
            Infinitivo<input type="text" name="Infinitivo" id="">
            Passado<input type="text" name="Pasado" id="">
            Participio<input type="text" name="Participio" id="">
            
        </form>

    
    
</body>
</html>