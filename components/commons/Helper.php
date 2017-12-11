<?php

namespace app\components\commons;

class Helper {
    
    static function purify($value){
        return strip_tags($value);
    }
    
    
}
