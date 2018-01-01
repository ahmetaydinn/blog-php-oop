<?php

namespace app\components\validators;

use \app\components\base\Validator as BaseValidator;

class EmailValidator extends BaseValidator {

    public static function isValid($value, $options = []) {
        if (isset($value) && trim($value) != '') {
            return (filter_var($value, FILTER_VALIDATE_EMAIL));
        }
        return true;
    }

}
