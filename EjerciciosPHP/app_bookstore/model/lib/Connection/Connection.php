<?php

namespace model\lib\Connection;

class Connection {
    protected static $instance = null;

    public static function getInstance($configPath) {
        if (self::$instance === null) {
            $string_json = file_get_contents($configPath, FILE_USE_INCLUDE_PATH);
            self::$instance = new Connector($string_json);
        }
        return self::$instance;
    }
    
    public function __clone() {
        
    }
}
