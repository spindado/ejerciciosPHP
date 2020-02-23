<?php
class Conexion

{
    private static $instance = NULL;
    private $con;

    private function __construct($configFile)
    {
        $config = file_get_contents($configFile);
        $config = json_decode($config, true);

        try {

            $pdo = new PDO($config['DBType'] . ":" . $config['DBName'] . ";" . $config['DBHost'], $config['DBUsername'], $config['DBPassword'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->con = $pdo;
        } catch (PDOException $e) {

            try {

                //Acceder a localHost y crear BBDD:
                $this->con = new PDO($config['DBType'] . ":"  . $config['DBHost'], $config['DBUsername'], $config['DBPassword'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
                $this->con->prepare('CREATE DATABASE IF NOT EXISTS libroseli COLLATE utf8_spanish_ci')->execute();
            } catch (PDOException $e) {
                echo "no se ha podido crear la BBDD";
            }
        }
    }

    private function __clone()
    {
    }

    public static function getInstance($configFile)
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($configFile);
        }
        return self::$instance;
    }


    public function connectToDB()
    {
        return $this->con;
    }

    public function query($query)
    {
        try {
            $statement = $this->con->prepare(trim($query));
            $statement->execute();
        } catch (Exception $e) {

            throw $e;
        }
    }

    public function selectQuery($query)
    {
        //var_dump($query);
        try {

            $statement = $this->con->prepare(trim($query));
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $exception) {
            return "ERROR AL REALIZAR LA QUERY" . $exception;
        }
    }

    public function dbClose()
    {
        $this->con = null;
        echo "CONEXIÓN CERRADA";
    }
}
