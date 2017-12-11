<?php

namespace app\models;

use app\components\Application;
use app\components\base\Model as BaseModel;
use app\components\base\ModelFactory;
use app\components\ModelError;

class User extends BaseModel {

    public function validate() {

        if (trim($this->firstname) == '') {
            $this->addError(new ModelError('firstname', 'Firstname is required'));
        }
        if (trim($this->lastname) == '') {
            $this->addError(new ModelError('lastname', 'Lastname is required'));
        }

        if ($this->hasErrors()) {
            return false;
        }

        return true;
    }

    public function update() {

        if ($this->validate()) {

            $conn = Application::app()->db->conn;
            $sql = " UPDATE user set "
                    . " firstname=?, "
                    . " lastname=? "
                    . " WHERE id=? ";

            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $this->purifier('firstname'),
                $this->purifier('lastname'),
                $this->id
            ]);

            return true;
        }
        return false;
    }

    public function insert() {

        if ($this->validate()) {

            $conn = Application::app()->db->conn;
            $sql = " INSERT INTO user "
                    . " ( firstname, lastname ) "
                    . " VALUES  "
                    . " ( ?, ? )";

            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $this->purifier('firstname'),
                $this->purifier('lastname'),
            ]);
            $this->id = $conn->lastInsertId();

            return true;
        }
        return false;
    }

    static function delete($id) {

        $conn = Application::app()->db->conn;
        $sql = 'DELETE FROM user WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    static function create() {
        return ModelFactory::create('User');
    }

    static function find($id) {

        $conn = Application::app()->db->conn;
        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = ModelFactory::create('User');
        return $user->loadAttributes($stmt->fetch(\PDO::FETCH_ASSOC));
    }

    static function findAll($select = [], $filter = [], $order = '') {

        $conn = Application::app()->db->conn;
        $sql = 'SELECT * FROM user ORDER BY id DESC';
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
