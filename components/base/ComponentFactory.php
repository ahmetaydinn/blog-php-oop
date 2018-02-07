<?php

namespace app\components\base;

/**
 * Factory of Components
 * 
 * @author victor.leite@gmail.com
 */
class ComponentFactory {

    /**
     * Create the Component following the $config parameters
     * @param type $name
     * @param type $config
     * @return \app\components\base\className
     * @throws \Exception
     */
    public static function create($name, $config) {
        $className = $config['class'];
        if (!isset($className)) {
            throw new \Exception("The class in componet {$name} must to be passed");
        }
        return new $className($config);
    }

}
