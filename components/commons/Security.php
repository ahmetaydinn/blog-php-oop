<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components\commons;

/**
 * Description of Security
 *
 * @author victor.leite@gmail.com
 */
class Security {

    static function setCsrfSession($csrfToken) {

        $_SESSION['csrfToken'] = $csrfToken;
    }

    static function getCsrfSession() {

        return $_SESSION['csrfToken'];
    }

    /**
     * Generate Token every request
     * @return type
     */
    static function generateCsrfToken() {
        if (!session_id()) {
            session_start();
        }
        $sessionId = session_id();
        $token = sha1(uniqid() . $sessionId);
        self::setCsrfSession($token);
        return $token;
    }

    /**
     * check CSRF token
     * 
     */
    static function checkCsrfToken($token) {
        return $token === self::getCsrfSession();
    }

}
