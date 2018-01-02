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

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }

    public function __isset($name) {
        if (!isset($this->data[$name])) {
            throw new \OutOfRangeException('Invalid name given');
        }

        return $this->data[$name];
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }

    static function debug($obj, $kill = true) {
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
        if ($kill) {
            exit;
        }
    }

}
