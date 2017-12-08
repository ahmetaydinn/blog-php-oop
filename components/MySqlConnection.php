<?php

namespace app\components;

use app\componets\base\iConnection;

class MySqlConnection implements iConnection {
    
    public $conn;
    
    public function connect($config = []) {
     
        try {
            $conn = new \PDO($config['dsn'], $config['username'], $config['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
        $this->conn = $conn;
    }

    public function close() {
        $this->conn = null;
    }

}
