<?php

namespace app\components\base;
/**
 * Abstract class responsable to resolve the router finding the controller and action classes name
 */
abstract class Router {
    /**
     * Name of controller class that will be called further
     * @var type 
     */
    private $controllerName;
    /**
     * Name of action class that will be called further
     * @var type 
     */
    private $actionName;
    /**
     * Contruction that implement the default url router /index.php?r=controllerName/actionName
     * @param type $owner
     * @throws \Exception
     */
    public function __construct($owner) {

        $r = $_GET['r'];
        if (!isset($r)) {
            $r = $owner->getConfig('defaultRoute');
        }
        $aux = explode('/', $r);

        if (count($aux) != 2) {
            throw new \Exception('Route is not well configured');
        }
        
        $this->controllerName = $aux[0];
        $this->actionName = $aux[1];
    }
    /**
     * Return the name of controller class
     * @return type
     */
    public function getControllerName() {
        return $this->controllerName;
    }
    /**
     * Return the name of action class
     * @return type
     */
    public function getActionName() {
        return $this->actionName;
    }

}

?>