<?php

namespace app\components\base;

/*
 * Base class to be inherited
 * 
 * @author victor.leite@gmail.com
 */

abstract class Component {

    protected $_config;

    public function __construct($config) {
        $this->_config = $config;
    }

    /**
     *  Method to be implemented by the instance and represents the start of component execution
     */
    abstract function bootstrap($params);

    /**
     * Method to be implemented by the instance and represents the end of compenent execution
     */
    abstract function end($params);
}
