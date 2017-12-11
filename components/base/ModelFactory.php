<?php

namespace app\components\base;
/**
 * Using Factory
 */
class ModelFactory {

    public static function create($type = '') {

        if ($type == '') {
            throw new \Exception('Invalid Model Type.');
        } else {

            $className = 'app\models\\' . ucfirst($type);
            if (class_exists($className)) {
                return new $className();
            } else {
                throw new \Exception("Model type {$className} not found.");
            }
        }
    }

}
