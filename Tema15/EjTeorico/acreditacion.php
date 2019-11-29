<?php
 session_start();
 if (!isset($_SESSION['identificativo'])){//¿No está ya acreditado?

    if(isset($_REQUEST['identificativo']) && isset($_REQUEST['clave'])){//¿Ha rellenado el formulario?
        if($_REQUEST['identificativo']=='juanfe' && $_REQUEST['clave']='secreto'){//Son correctas las credenciales
            $_SESSION['identificativo']=$_REQUEST['identificativo'];
            header('Location: informacion.php'.SID);
        }else{ //No son correctas las credenciales
            header('Location: acreditacion.php');
        }
    }else{ //No ha rellenado el formulario
        echo '<form action="acreditacion.php" method="POST">';
        echo '<label for="id_identificativo">Identificativo:</label>';
        echo '<input type="text" id="id_identificativo" name="identificativo"/>';
        echo '<br />';
        echo '<label for="id_clave">Clave:</label>';
        echo '<input type="password" id="id_clave" name="clave"/>';
        echo '<br />';
        echo '<input type="submit" value="Entrar"/>';
        echo '</form>';
    }
}else{//Sí está ya acreditado
    header('Location: informacion.php'.SID);
}
?>