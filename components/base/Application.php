<?php

namespace app\components\base;

use \app\componets\base\iConnection;
use \app\components\base\Controller as BaseController;
use app\components\base\DatabaseFactory;
use app\components\base\ControllerFactory;

class Application extends Base {

    private $_config = [];
    private static $app;
    public $name = '';
    public $db;
    public $router;
    public $controller;

    public function __construct($config = []) {

        $this->_config = $config;
        Application::$app = $this;
    }

    public function getConfig($name) {
        return $this->_config[$name];
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

        $this->bootstrap();

        $this->end();
    }

    private function preInit() {
        // load configs
        $this->name = $this->_config['name'];
    }

    private function init() {

        // load the components
        // example load the database
        $this->loadDatabase();

        // handle requests and got to route
        $this->resolveRoutes();
    }

    private function bootstrap() {

        $this->controller->callAction($this->router->getActionName());
    }

    public function end() {

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

        $router = new Router($this);
        $this->setRouter($router);
        //create the controller and run action
        $controller = ControllerFactory::create($router->getControllerName());
        $this->setController($controller);
    }

    private function setRouter($router) {
        $this->router = $router;
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