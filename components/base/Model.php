<?php

namespace app\components\base;

use \app\components\ModelError;
use \app\components\commons\Helper;

abstract class Model extends Base implements iModel {

    public $errors = [];

    public function loadAttributes($attributes = []) {

        if (isset($attributes) && is_array($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $this->$attribute = $value;
            }
        }
        return $this;
    }

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
    
    public function purifier($attribute){
        return Helper::purify($this->$attribute);
    }

}
