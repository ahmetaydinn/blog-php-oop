<?php

namespace app\components\base;

abstract class Model extends Base implements iModel { 
    
    public $error = [];

    public function loadAttributes($attributes = []) {

        if (isset($attributes) && is_array($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $this->$attribute = $value;
            }
        }
        return $this;
    }

}
