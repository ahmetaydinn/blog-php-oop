<?php

namespace app\components\validators;

use \app\components\base\Validator as BaseValidator;

class RequiredValidator extends BaseValidator {

    public static function isValid($value, $options = []) {
        if (!isset($value) || trim($value) == '') {
            return false;
        }
        return true;
    }

}
