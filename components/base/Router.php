<?php

namespace app\components\base;

class Router {

    private $controllerName;
    private $actionName;

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

    public function getControllerName() {
        return $this->controllerName;
    }

    public function getActionName() {
        return $this->actionName;
    }

}

?>