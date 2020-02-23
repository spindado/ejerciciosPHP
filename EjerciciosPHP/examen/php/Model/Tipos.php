<?php

class Tipos{

    public function __construct(){}
    
    public function getTipos($pdo){
        $sql="SELECT DISTINCT `tipo` FROM `tipos`";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}