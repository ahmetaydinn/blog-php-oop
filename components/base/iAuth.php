<?php

namespace app\components\base;

interface iAuth {

    public function login();

    static function isLogged();
    
    static function logout();
}
