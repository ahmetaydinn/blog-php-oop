<?php

namespace app\components\base;

/**
 * Interface to be implemented in all database connections classes
 * 
 * @author victor.leite@gmail.com
 */
interface iConnection {

    public function connect($config);

    public function close($params);
}
