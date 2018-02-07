<?php

namespace app\components\base;

/**
 * Interface to be implemented in all database connections classes
 * 
 * @author victor.leite@gmail.com
 */
interface iConnection {

    /**
     *  Abstraction that force the instance implement the connection 
     * @param type $config
     */
    public function connect($config);

    /**
     *  Abstraction that force the instance close the connection 
     * @param type $params
     */
    public function close($params);
}
