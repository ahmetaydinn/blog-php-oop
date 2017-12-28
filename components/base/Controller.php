<?php

namespace app\components\base;

abstract class Controller extends Base {

    protected function beforeAction($actionName) {
        
    }

    protected function afterAction($actionName) {
        
    }

    public function callAction($actionName) {
        $realName = 'action' . ucfirst($actionName);
        if (is_callable([$this, $realName])) {
            $this->beforeAction($realName);
            $this->$realName();
            $this->afterAction($realName);
        } else {
            throw new \Exception("The action $realName does not exist!");
        }
    }

    public function render($viewFile, $params = []) {

        include $viewFile . '.php';
    }

    public function redirect($route) {

        header("Location: index.php?r=$route");
        die();
    }

}

?>
