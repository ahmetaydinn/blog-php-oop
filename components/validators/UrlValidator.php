<?php

namespace app\components\validators;

use \app\components\base\Validator as BaseValidator;
/**
 * Class to check if the URL is valid following, example: http://www.google.com
 * 
 * @author victor.leite@gmail.com
 */
class UrlValidator extends BaseValidator {

    public static function isValid($value, $options = []) {
        if (isset($value) && trim($value) != '') {
            return (filter_var($value, FILTER_VALIDATE_URL));
        }
        return true;
    }

}
