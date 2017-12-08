<?php

namespace app\components\base;

abstract class Controller {
    
    public function render($file){
        print_r($this);
        include '../'. $file. '.php';         
    }
    
}
?>
