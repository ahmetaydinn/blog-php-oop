<?php

namespace app\components\base;

/**
 * Example of Simple Factory design Pathern
 * http://designpatternsphp.readthedocs.io/en/latest/Creational/SimpleFactory/README.html
 * 
 * @author victor.leite@gmail.com
 */
class ControllerFactory {

    /**
     * Create the controller instance dinamically
     * @param type $controllerName
     * @return \app\components\base\className
     * @throws \Exception
     */
    public static function create($controllerName) {
        $fileName = ucfirst($controllerName) . 'Controller.php';
        $className = "app\controllers\\" . ucfirst($controllerName) . 'Controller';
        $filePath = './controllers/' . $fileName;
        require_once($filePath);
        if (!class_exists($className)) {
            throw new \Exception("Class $className not founded!");
        }
        return new $className();
    }

}
