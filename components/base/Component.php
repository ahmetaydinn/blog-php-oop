<?php

namespace app\components\base;

abstract class Component {

    protected $_config;

    public function __construct($config) {
        $this->_config = $config;
    }

    abstract function bootstrap($params);

    abstract function end($params);
}
