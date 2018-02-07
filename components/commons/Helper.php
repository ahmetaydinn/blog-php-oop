<?php

namespace app\components\commons;
/**
 * Class with common and general methods to help the views, models and controllers.
 * 
 * @author victor.leite@gmail.com
 */
class Helper {
    /**
     * Add a specific word to the end of a text with a limited caracters. 
     * @param type $value
     * @param type $caracter
     * @param type $quantity
     * @return type
     */
    static function inTheEnd($value, $caracter, $quantity) {
        if (strlen($value) >= $quantity) {
            return substr($value, 0, $quantity) . $caracter;
        }
        return $value;
    }
    /**
     * Format the date in a specific format
     * @param type $value
     * @param type $format
     * @return type
     */
    static function dateFormat($value, $format) {
        $date = new \DateTime($value);
        return $date->format($format);
    }
    /**
     * Decode html tags
     * @param type $value
     * @return type
     */
    static function decodeHTML($value) {
        return html_entity_decode($value);
    }
    /**
     * Get the user request IP
     * @return type
     */
    static function getUserIP() {
        switch (true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }
    /**
     * Check if the date is today.
     * @param type $value
     * @return boolean
     */
    static function isToday($value) {
        $today = date('Y-m-d');
        if ($value == $today){
            return true;
        }
        return false;
    }

}
