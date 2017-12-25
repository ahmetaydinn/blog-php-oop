<?php

namespace app\components;

use app\componets\base\iConnection;
use app\components\base\Component;

class MySqlConnection extends Component implements iConnection {

    public $conn;
        
    public function __construct($config) {
        parent::__construct($config);
    }

    public function bootstrap($params = []) {
        return $this->connect($this->_config);
    }

    public function end($params = []) {
        return $this->close($this->_config);
    }   

    public function connect($config) {

        if (!is_array($config)) {
            throw new \Exception('Config array must be passed!');
        }
        if (!isset($config['dsn'])) {
            throw new \Exception('Config dsn must be passed');
        }
        if (!isset($config['username'])) {
            throw new \Exception('Config username must be passed');
        }
        if (!isset($config['password'])) {
            throw new \Exception('Config password must be passed');
        }

        try {
            $conn = new \PDO($config['dsn'], $config['username'], $config['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $this->conn = $conn;

        return;
    }

    public function close() {
        $this->conn = null;
    }

}
