<?php
class Conexion

//OJO CON LAS RUTAS DE CONFIG
//LO ÚNICO QUE CAMBIA SON: RUTAS Y EL NOMBRE DE LA BBDD EN EL CREATE
{
    private static $instance = NULL;
    private $con = NULL;

    private function __construct()
    {
        $config = file_get_contents("../config/config.json");
        $config = json_decode($config, true);

        try {
            $this->con = new PDO($config['DBType'] . ":" . $config['DBName'] . ";" . $config['DBHost'], $config['DBUsername'], $config['DBPassword'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            //$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->con->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            //echo "creando la BBDD" . $e->getMessage();
            try {
                //Acceder a localHost y crear BBDD:
                $this->con = new PDO($config['DBType'] . ":"  . $config['DBHost'], $config['DBUsername'], $config['DBPassword'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $this->con->prepare('CREATE DATABASE IF NOT EXISTS imagenes COLLATE utf8_spanish_ci')->execute();
                //Crear tablas:
                $createTables = file_get_contents("../config/createTable.sql");
                $this->con->prepare($createTables)->execute();
                //Insertar datos:
                //$insertData = file_get_contents("../config/insertData.sql");
                //$this->con->prepare($insertData)->execute();
            } catch (PDOException $e) {
                echo "no se ha podido crear la BBDD";
            }
        }
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
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
            //var_dump($statement);
            $res = $statement->execute();
            return $res;
        } catch (PDOException $exception) {
            echo "No se ha podido acceder a la BBDD";
        }
    }

    public function selectQuery($query)
    {
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

            /*
Ejemplo:$query= “Select * from book where autor=:author’;
$statement = $db->prepare($query);
$statement->bindValue(‘author’,’Cervantes’);
$statement->execute();
$rows=$statement->fetchAll();
var_dump(rows);

        */
