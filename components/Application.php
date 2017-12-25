<?php

namespace app\components;

use app\components\base\Application as BaseApplication;
use app\componets\base\iConnection;
use app\components\base\Controller as BaseController;
use app\components\base\ComponentFactory;
use app\components\base\Component;
use app\components\base\ControllerFactory;
use app\components\base\Router as BaseRouter;
use app\components\Router;

class Application extends BaseApplication {

    public $name = '';
    public $router;
    public $controller;

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
        $this->name = $this->_config['name'];
    }

    /**
     * Inicialize the components and resolve the routes
     */
    private function init() {

        // Inicialize all components
        if (is_array($this->_config['components'])) {

            foreach ($this->_config['components'] as $name => $component) {

                $component = ComponentFactory::create($name, $component);
                $this->setComponent($name, $component)->bootstrap();
            }
        }
        // handle requests and got to route
        $this->resolveRoutes();
    }
    
    private function setComponent(string $name, Component $component){        
        $this->$name = $component;
        return $this->$name;
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

        // Inicialize all components
        if (is_array($this->_config['components'])) {

            foreach ($this->_config['components'] as $name => $component) {

                $this->$name->close();
            }
        }
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
