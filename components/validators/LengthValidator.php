<?php

namespace app\components\validators;

use \app\components\base\Validator as BaseValidator;
/**
 * Class to validate the lenght of text.
 * 
 * @author victor.leite@gmail.com
 */
class LengthValidator extends BaseValidator {

    public static function isValid($value, $options) {

        if (!isset($options['quantity'])) {
            throw new \Exception('Option quantity need to be passed');
        }

        if (isset($value) && trim($value) != '' && strlen($value) > $options['quantity']) {
            return false;
        }
        return true;
    }

}
