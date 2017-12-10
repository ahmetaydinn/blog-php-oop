<?php

namespace app\components\base;

abstract class Application extends Base {

    private static $app;

    public function __construct($config = []) {

        $this->config = $config;
        Application::$app = $this;
    }

    static function app() {

        return self::$app;
    }

    public function getConfig($name) {
        return $this->config[$name];
    }

    public static function getInstance($config = []) {

        static $instance = null;

        if (null === $instance) {
            //$class = get_class($this);
            //die($class);
            //$instance = new $class();
            $instance = new static($config);
        }

        return $instance;
    }

}

?>