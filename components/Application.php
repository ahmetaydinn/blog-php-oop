<?php

namespace app\components;

use app\components\base\Application as BaseApplication;
use app\componets\base\iConnection;
use app\components\base\Controller as BaseController;
use app\components\base\DatabaseFactory;
use app\components\base\ControllerFactory;
use app\components\base\Router as BaseRouter;
use app\components\Router;

class Application extends BaseApplication {

    public $name = '';
    public $db;
    public $router;
    public $controller;

    public function __construct($config = []) {

        parent::__construct($config);
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

    /**
     * Load config from the config file
     */
    private function preInit() {
        // load configs
        $this->name = $this->config['name'];
    }

    /**
     * Inicialize the components and resolve the routes
     */
    private function init() {

        // load the components
        // example load the database
        $this->loadDatabase();

        // handle requests and got to route
        $this->resolveRoutes();
    }

    /**
     * Launch the action of controller
     */
    private function bootstrap() {

        $this->controller->callAction($this->router->getActionName());
    }

    /**
     * Finish the application correctly and every component
     */
    public function end() {

        // close connection
        if (isset($this->db)) {
            $this->db->close();
        }
    }

    private function loadDatabase() {

        if (isset($this->config['db'])) {
            if (!isset($this->db)) {
                $db = DatabaseFactory::create($this->config['db']);
                $this->setDb($db);
                $this->db->connect($this->config['db']);
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

    private function setRouter(BaseRouter $router) {

        $this->router = $router;
    }

    private function setController(BaseController $controller) {

        $this->controller = $controller;
    }

}
