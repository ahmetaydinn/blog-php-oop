<?php

namespace app\classes\models;

use app\components\base\Model as ModelBase;
use app\components\App;
use app\components\base\ModelFactory;

class Author extends ModelBase {

    public static function create() {
        return ModelFactory::create('Author');
    }

    public function validate() {
        // TODO Validate this model attributes
    }

    static function findByUserName($username) {


        $conn = App::app()->db->conn;
        $sql = "SELECT * FROM author where login = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $username
        ]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (null != $row) {
            $author = ModelFactory::create('Author');
            $author->loadAttributes($row);
            return $author;
        }
        return null;
    }

    public function save() {
        // TODO insert or update this model
    }

    public static function delete() {
        // TODO delete this model
    }

    public static function find($id) {
        // TODO find this model
    }

}
