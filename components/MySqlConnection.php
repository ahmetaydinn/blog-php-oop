<?php

namespace app\components;

use app\components\base\iConnection;
use app\components\base\Component;
/**
 *  class for manipulate Mysql connection
 * 
 * @author victor.leite@gmail.com
 */
class MySqlConnection extends Component implements iConnection {
    
    /**
     * Instance of Mysql PDO connection
     * @var type \
     */
    public $conn;

    public function __construct($config) {
        parent::__construct($config);
    }
    /**
     * Starting method
     * @param type $params
     * @return type
     */
    public function bootstrap($params = []) {
        return $this->connect($this->_config);
    }
    /**
     * Finishing method
     * @param type $params
     * @return type
     */
    public function end($params = []) {
        return $this->close($this->_config);
    }
    /**
     * Initialize the connection with the mysql database based on config parameters passed.
     * @param type $config
     * @return type
     * @throws \Exception
     */
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
    /**
     * Kill the connection with mysql database
     * @param type $params
     */
    public function close($params = []) {
        $this->conn = null;
    }

}
