<?php
    define("NUMTABLAS", 3);

    for($i = 1; $i <= NUMTABLAS; $i++){
        echo "<p>Tabla del $i</p>";
        for($j = 1; $j <= 10; $j++){
            $result = $i*$j;
            echo "<p> $i x $j = $result </p>";
            
        };

    }
    
        

    


?>