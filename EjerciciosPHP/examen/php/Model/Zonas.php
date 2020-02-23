<?php

class Zonas{

    public function __construct(){}
    
    public function getZonas($pdo){
        $sql="SELECT DISTINCT `lugar` FROM `zonas`";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}