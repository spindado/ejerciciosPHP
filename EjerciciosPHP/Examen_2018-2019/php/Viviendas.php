<?php

  class Viviendas{
  
      public $tipo; 
      public $zona;
      public $precio;
      public $dormitorios;
      public $image;
      public $extras;
      function __construct($tipo,$zona, $precio, $dormitorios,$image,$extras)
      {
        $this->tipo=$tipo;
        $this->zona=$zona;
        $this->precio= $precio;
        $this->dormitorios=$dormitorios;
        $this->image= $image;
        $this->extras=$extras;
      }
      function insertViviendasDB(){
        $conexion = $db->getConection();
        $piscina=$this->extras['piscina'];
        $garage= $this->extras['garage'];
        $zonacomun= $this->extras['zonascomunes'];
        $padel=$this->extras['padel'];
        $jardin=$this->extras['jardin'];
        try{
          $sql="insert into viviendas (tipo, zona, precio, dormitorios, garage, jardin, padel, piscina, zonacomun, imagen) values ('$this->tipo', '$this->zona', '$this->precio','$this->dormitorios', '$garage', '$jardin', '$padel', '$piscina','$zonacomun', '$this-> imagen')";
          $resp=$db->conexion->exec($sql);
          return $resp;
        }catch(PDOexception $e){
    
          echo "Error: ".$e;
          exit;
        }
      }
  }

?>