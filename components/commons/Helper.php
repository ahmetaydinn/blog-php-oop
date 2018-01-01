<?php

namespace app\components\commons;

class Helper {
    
    static function inTheEnd($value, $caracter, $quantity) {
        if (strlen($value) >= $quantity) {
            return substr($value, 0, $quantity) . $caracter;
        }
        return $value;
    }

    static function dateFormat($value, $format) {
        $date = new \DateTime($value);
        return $date->format($format);
    }
    
    static function decodeHTML($value) {
        return html_entity_decode($value);
    }

}
