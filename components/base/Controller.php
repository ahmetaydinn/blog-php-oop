<?php

namespace app\components\base;

abstract class Controller extends Base {

    public function callAction($actionName) {
        $realName = 'action' . ucfirst($actionName);
        if (is_callable([$this, $realName])) {
            $this->$realName();
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
