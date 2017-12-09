<?php

namespace app\components\base;

class DatabaseFactory {

    public static function create($config = []) {
        $className = $config['class'];
        if (!isset($className)) {
            throw new \Exception('The class in db connection \\config\\main.php must to be passed');
        }
        return new $className($config);
    }

}
