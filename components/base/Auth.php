<?php

namespace app\components\base;

use app\components\base\ModelError;

/**
 * 
 * @author victor.leite@gmail.com
 */
abstract class Auth extends Base {
    
    protected $errors = [];

    abstract public function login();

    abstract static function isLogged();

    abstract static function logout();

    protected function addError(ModelError $error) {
        $this->errors[] = $error;
    }

    public function hasErrors() {
        if (count($this->errors) > 0) {
            return true;
        }
        return false;
    }

    public function getErrors() {
        return $this->errors;
    }

}
