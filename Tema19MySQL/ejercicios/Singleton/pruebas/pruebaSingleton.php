<?php 
    class MySingleton{
        private static $instance;
        private $count;

        private function __construct(){
            echo "Construyendo objeto..." .PHP_EOL;
        }

        public static function getInstance(){

            if(!self::$instance instanceof self){
                self::$instance = new self();
            }

            return self::$instance;
        }
        public function hazAlgo(){
            echo "Escribimos algo por pantalla." .PHP_EOL;
            ++$this->count;
        }

        public function getCounter(){

            return $this->count;
        }
    }

    MySingleton::getInstance()->hazAlgo();
    MySingleton::getInstance()->hazAlgo();
    MySingleton::getInstance()->hazAlgo();

    echo 'Contador ='.mySingleton::getInstance()->getCounter().PHP_EOL;

?>