<?php

namespace app\components\base;

abstract class Controller extends Component{

    public function callAction($actionName) {
        $realName = 'action'. ucfirst($actionName);
        if (is_callable([$this, $realName])) {
            $this->$realName();
        }else{
            throw new \Exception("The action $realName does not exist!");
        }
        
    }

    public function render($file, $params=[]) {
        include $file . '.php';
    }

}

?>
