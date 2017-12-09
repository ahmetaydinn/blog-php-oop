<?php

namespace app\components\base;

use \app\componets\base\iConnection;
use \app\components\base\Controller as BaseController;
use app\components\base\DatabaseFactory;
use app\components\base\ControllerFactory;

class Application extends Component {

    private $_config = [];
    private static $app;
    public $name = '';
    public $db;
    public $controller;

    public function __construct($config = []) {

        $this->_config = $config;
        Application::$app = $this;
    }

    static function app() {

        return self::$app;
    }

    public function run() {

        $this->lifeCicle();
    }

    private function lifeCicle() {

        $this->preInit();

        $this->init();

        $this->end();
    }

    private function preInit() {
        // load configs
        $this->name = $this->_config['name'];
    }

    private function init() {

        // load and connect Database
        $this->loadDatabase();

        // handle requests and got to route
        $this->resolveRoutes();
    }

    private function end() {

        // close connection
        $this->db->close();
    }

    private function loadDatabase() {

        if (isset($this->_config['db'])) {
            if (!isset($this->db)) {
                $db = DatabaseFactory::create($this->_config['db']);
                $this->setDb($db);
                $this->db->connect($this->_config['db']);
            }
        }
    }

    private function setDb(iConnection $db) {

        $this->db = $db;
    }

    private function resolveRoutes() {

        $r = $_GET['r'];
        if (!isset($r)) {
            $r = $this->_config['defaultRoute'];
        }
        $aux = explode('/', $r);
        $controllerName = $aux[0];
        $actionName = $aux[1];

        if (count($aux) != 2) {
            throw new \Exception('Route is not well configured');
        }
        //create the controller and run action
        $controller = ControllerFactory::create($controllerName);
        $this->setController($controller);
        $this->controller->callAction($actionName);
    }

    private function setController(BaseController $controller) {

        $this->controller = $controller;
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