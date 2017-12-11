<?php

namespace app\components\base;

interface iModel {

    public function validate();
    public function update();
    public function insert();
    
    static function delete($id);
    static function create();
    static function find($id);
    static function findAll();
    
}
