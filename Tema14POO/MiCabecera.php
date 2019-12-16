<<?php 
    class MiCabecera{
        private $text;

        public function __construct($text){
            $this->text = $text;
        }


        public function __toString(){
            return "<header>" .$this->text."</header>";
        }
    }
?>