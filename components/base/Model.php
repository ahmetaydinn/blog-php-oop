<?php

namespace app\components\base;

use \app\components\ModelError;

/*
 * This abstract class represent an abstraction to ORM Active Record
 */

abstract class Model extends Base {

    public $errors = [];

    abstract static function find($id);

    abstract static function create();

    abstract static function delete($id);

    abstract function validate();

    abstract function save();

    public function addError(ModelError $error) {
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
