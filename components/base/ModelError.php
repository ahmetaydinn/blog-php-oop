<?php

namespace app\components\base;

/**
 * Class that abstract the model error 
 * 
 * @author victor.leite@gmail.com
 */
abstract class ModelError {

    /**
     * Name of field of the model associeted
     * @var type 
     */
    public $attribute;

    /**
     * Text of error message 
     * @var type 
     */
    public $message;

    /**
     * Contruct the error passing attribute and message 
     * @param type $attribute
     * @param type $message
     */
    public function __construct($attribute, $message) {
        $this->attribute = $attribute;
        $this->message = $message;
    }

}
