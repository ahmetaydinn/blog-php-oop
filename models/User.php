<?php

namespace app\models;

use \app\components\Application;
use \app\components\base\Model as BaseModel;

class User extends BaseModel {

    static function update($attributes = []) {
        
    }

    static function insert($attributes = []) {
        
    }

    static function delete($id) {
        
    }

    static function find($id) {
        
    }

    static function findAll($filter = []) {

        $conn = Application::app()->db->conn;
        $sql = 'SELECT firstname, lastname FROM user ORDER BY firstname';
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
