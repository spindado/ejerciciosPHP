<?php

  class DBConection{
    private $_connection;
    private static $_instance= null;

    public function __construct($configFile){
      $config = json_decode(file_get_contents($configFile), TRUE);
      $dsn = "{$config['DBType']}:host={$config['Host']};dbname={$config['DBName']}";
      $user = "{$config['User']}";
      $password = "{$config['Password']}";
      try{
        $this->_connection = new PDO($dsn,$user,$password);
      } catch (PDOException $e){
        throw $e;
      }
      
    }

    public static function getInstance($configFile){
      if(!self::$_instance) // Si no está instanciada se crea una
      { 
          self::$_instance = new self($configFile);
      }
      return self::$_instance;
    }

    public function getConection(){
      return $this->_connection;
    }

    public function exec($sql){
      
      $connect = $this->getConection();
      $statement = $connect->prepare($sql);
      $statement->execute();

    }

  }



?>