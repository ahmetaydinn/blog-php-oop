<?php

namespace app\components\base;

class ComponentFactory {

    public static function create($name, $config) {
        $className = $config['class'];
        if (!isset($className)) {
            throw new \Exception("The class in componet {$name} must to be passed");
        }
        return new $className($config);
    }

}
