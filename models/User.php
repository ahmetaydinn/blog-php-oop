<?php

namespace app\models;

use \app\components\Application;
use \app\components\base\Model as BaseModel;
use app\components\base\ModelFactory;

class User extends BaseModel {

    public function validate() {
        
    }

    public function update() {
        
    }

    public function insert() {
        
    }

    public function delete($id) {
        
    }

    static function create() {
        return ModelFactory::create('User');
    }

    static function find($id) {

        $conn = Application::app()->db->conn;
        $sql = 'SELECT * FROM user where id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = ModelFactory::create('User');
        return $user->loadAttributes($stmt->fetch(\PDO::FETCH_ASSOC));
    }

    static function findAll($select = [], $filter = [], $order = '') {

        $conn = Application::app()->db->conn;
        $sql = 'SELECT * FROM user ORDER BY firstname';
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $out = [];
        foreach ($rows as $row) {
            $user = ModelFactory::create('User');
            $out[] = $user->loadAttributes($row);
        }

        return $out;
    }

}
