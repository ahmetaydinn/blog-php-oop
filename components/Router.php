<?php

namespace app\components;

use app\components\base\Router as BaseRouter;

/**
 * Class responsable for resolve the Requests router finding the controller and action that will futher be called.
 * 
 * @author victor.leite@gmail.com
 */
class Router extends BaseRouter {

    public function __construct($owner) {
        parent::__construct($owner);
        /**
         * Implement here if you have a diferent route.
         */
    }

}

?>