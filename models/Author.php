<?php

namespace app\classes\models;

use app\classes\App;
use app\classes\base\ModelFactory;

class Author extends \app\classes\base\ModelBase {

    public static function create() {
        return ModelFactory::create('Author');
    }

    public function validate() {
        
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

}
