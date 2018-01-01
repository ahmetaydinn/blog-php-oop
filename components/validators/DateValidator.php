<?php

namespace app\components\validators;

use \app\components\base\Validator as BaseValidator;

class DateValidator extends BaseValidator {

    public static function isValid($value, $options) {

        if (!isset($options['format'])) {
            throw new \Exception('Option format need to be passed');
        }

        if (isset($value) && trim($value) != '') {

            $d = \DateTime::createFromFormat($options['format'], $value);
            
            if (\DateTime::getLastErrors()['error_count'] > 0) {
                return false;
            }
        }
        return true;
    }

}
