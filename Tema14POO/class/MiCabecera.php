<<?php 
    class MiCabecera{
        private $text;

        public function __construct($text){
            $this->text = $text;
        }

        public function getText(){
            return $this->text;
        }


        public function __toString(){
            return "<header>" .$this->text."</header>";
        }
    }
?>