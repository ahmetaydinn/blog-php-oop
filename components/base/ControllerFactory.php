<?php

namespace app\components\base;
/**
 * Example of Simple Factory design Pathern
 * http://designpatternsphp.readthedocs.io/en/latest/Creational/SimpleFactory/README.html
 */
class ControllerFactory {

    public static function create($controllerName) { 
        $fileName = ucfirst($controllerName). 'Controller.php';
        $className = "app\controllers\\". ucfirst($controllerName) . 'Controller';        
        $filePath = './controllers/'. $fileName;
        require_once($filePath);
        if(!class_exists($className)){
            throw new \Exception("Class $className not founded!");
        }     
        return new $className();
    }

}
