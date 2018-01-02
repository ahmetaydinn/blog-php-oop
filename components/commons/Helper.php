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

    static function getUserIP() {
        switch (true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }

    static function isToday($value) {
        $today = date('Y-m-d');
        if ($value == $today){
            return true;
        }
        return false;
    }

}
