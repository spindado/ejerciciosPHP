<?php

namespace model\lib\Connection;
use \PDO;
use \PDOException;

class Connector {

    protected $db;
    protected $dsn;
    protected $user;
    protected $password;
    protected $connector;

    public function __construct($configFile) {
        $config = json_decode($configFile, true);
        $this->db = $config['db'];
        $this->dsn = $config['dsn'];
        $this->user = $config['user'];
        $this->password = $config['password'];
        $this->connector = $this->connect();
    }

    public function create_bbdd() {
        try {
            $connector = new PDO($this->db, $this->user, $this->password);
            $create = file_get_contents("./model/sql/create.sql");
            $statement = $connector->prepare($create);
            $statement->execute();
        } catch(PDOException $e) {
            echo "<span>No se ha creado la base de datos</span><br/>";
            print "Error:" . $e->getMessage() . "<br/>";
        }
        return $connector;
    }

    public function connect() {
        try {
            $connector = new PDO($this->dsn, $this->user, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $connector->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<h2>No existe la base de datos, creándola</h2><br/>";
            $connector = $this->create_bbdd();
        }
        return $connector;
    }

    public function getConnector() {
        return $this->connector;
    }
}
