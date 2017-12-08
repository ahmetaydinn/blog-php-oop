<?php

namespace app\components\base;

use app\components\base\DatabaseFactory;

class Application extends Component{

    public $_name = '';
    private $_config = [];
    private $_db;

    public function __construct($config = []) {
        $this->_config = $config;
    }

    public function run() {
        $this->lifeCicle();
    }

    private function lifeCicle() {
        $this->preInit();
        
        $this->end();
    }

    private function preInit() {
        // load configs
        $this->_name = $this->_config['name'];
        // connect Database
        $this->loadDatabase();
    }

    private function end() {
        // close connection
        $this->_db->close();
    }

    private function loadDatabase() {

        if (isset($this->_config['db'])) {            
            $db = DatabaseFactory::create($this->_config['db']);
            $db->connect($this->_config['db']);
            $this->_db = $db;
        }
    }

    public static function getInstance($config = []) {

        static $instance = null;

        if (null === $instance) {
            //$class = get_class($this);
            //die($class);
            //$instance = new $class();
            $instance = new static($config);
        }

        return $instance;
    }

}

?>