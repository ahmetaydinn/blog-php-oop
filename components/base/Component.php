<?php

namespace app\components\base;

class Component {

    static function debug($obj, $kill = true) {
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
        if ($kill) {
            exit;
        }
    }

}
