<?php

namespace app\components\commons;

class Helper {

    static function purify($value) {
        return strip_tags($value);
    }

    static function inTheEnd($value, $caracter, $quantity) {
        if (strlen($value) >= $quantity) {
            return substr($value, 0, $quantity) . $caracter;
        }
        return $value;
    }

}
