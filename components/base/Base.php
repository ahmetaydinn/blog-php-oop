<?php

namespace app\components\base;
/**
 * Using Proxy Design Pathern
 */
abstract class Base {

    private $data = [];

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
        return isset($this->data[$name]);
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
