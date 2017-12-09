<?php

namespace app\components\base;

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
