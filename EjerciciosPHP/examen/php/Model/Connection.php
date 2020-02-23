<?php

class Connection
{
    private $pdo;

    public function __construct($path)
    {
        try {
            if (file_exists($path)) {
                $conf = json_decode(file_get_contents($path), true);
                $dsn = "$conf[type]:host=$conf[host];dbname=$conf[name]";
                $user = $conf['user'];
                $password = $conf['password'];
                $pdo = new PDO($dsn, $user, $password);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $this->pdo = $pdo;
            }
        } catch (PDOException $p) {
            $error->message = $p->getMessage();
            $error->code = $p->getCode();
            $error->file = $p->getFile();
            $error->line = $p->getLine();

            $e = serialize($error);
            $url = "./View/inexistente.php?error=$e";
            header("Location: $url");
            exit;
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function createDB($sqlFile, $path)
    {
        try {
            $conf = json_decode(file_get_contents($path), true);

            $dsn = "$conf[type]:host=$conf[host]";
            $user = $conf['user'];
            $password = $conf['password'];
            $pdo = new PDO($dsn, $user, $password);
            $sql = file_get_contents($sqlFile);

            $pdo->exec($sql);
        } catch (PDOException $p) {
            echo $p->getMessage();
        }
    }
}
