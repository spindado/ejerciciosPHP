<?php

class Usuarios{

    public function __construct(){}

    public function getSubscription($pdo, $user, $pass){
        $sql ="SELECT subscription FROM usuarios WHERE user=:user AND pass=:pass";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(":user", $user);
        $stm->bindParam(":pass", $pass);
        $stm->execute();
        return $stm->fetch()->subscription;
    }

}