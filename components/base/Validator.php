<?php

namespace app\components\base;

/**
 * Abstract Class to be inherited by all validators
 *  
 * @author victor.leite@gmail.com
 */
abstract class Validator {

    /**
     * Check if the $value is valid
     */
    abstract static function isValid($value, $options);
}
