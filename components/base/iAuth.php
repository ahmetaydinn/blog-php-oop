<?php

namespace app\components\base;


/**
 * This interface makes part of Strategy design pattern 
 * 
 * @author victor.leite@gmail.com
 */
interface iAuth {

    public function login();

    static function isLogged();
    
    static function logout();
}
