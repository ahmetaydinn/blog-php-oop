<?php

namespace app\components\base;

abstract class ModelError{

    public $attribute;
    public $message;
    
    public function __construct($attribute, $message) {
        $this->attribute = $attribute;
        $this->message = $message;
    }

}
