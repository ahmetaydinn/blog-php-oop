<?php

namespace app\components\base;

use app\components\base\ModelError;

/**
 * Class that define authentication proccess
 * 
 * @author victor.leite@gmail.com
 */
abstract class Auth extends Base {
    /**
     * Errors array of this model
     * @var type 
     */
    protected $errors = [];

    abstract public function login();

    abstract static function isLogged();

    abstract static function logout();
    /**
     * Add error to this model
     * @param ModelError $error
     */
    protected function addError(ModelError $error) {
        $this->errors[] = $error;
    }
    /**
     * Check if there is erros attached within this model
     * @return boolean
     */
    public function hasErrors() {
        if (count($this->errors) > 0) {
            return true;
        }
        return false;
    }
    /**
     * Get this model errors array
     * @return type
     */
    public function getErrors() {
        return $this->errors;
    }

}
