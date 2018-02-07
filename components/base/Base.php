<?php

namespace app\components\base;

/**
 * This class give the flexibility to insert properties to the object dinamically.
 * 
 * @author victor.leite@gmail.com
 */
abstract class Base {

    private $data = [];

    public function loadAttributes($attributes = []) {

        if (isset($attributes) && is_array($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $this->$attribute = $value;
            }
        }
        return $this;
    }

    /**
     * Magic method to add attribute to the instance
     * @param type $name
     * @param type $value
     */
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    /**
     * Magic method to get attribute of this instance
     * @param type $name
     * @return type
     */
    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }

    /**
     * Magic method to check if the attribute exists
     * @param type $name
     * @return type
     * @throws \OutOfRangeException
     */
    public function __isset($name) {
        if (!isset($this->data[$name])) {
            throw new \OutOfRangeException('Invalid name given');
        }

        return $this->data[$name];
    }

    /**
     * Magic method to kill the model attribute 
     * @param type $name
     */
    public function __unset($name) {
        unset($this->data[$name]);
    }

    /**
     * Debug any object
     * Improvements: Get the level of debug just to human, excluding the recursion.
     * @param type $obj
     * @param type $kill
     */
    static function debug($obj, $kill = true) {
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
        if ($kill) {
            exit;
        }
    }

}
