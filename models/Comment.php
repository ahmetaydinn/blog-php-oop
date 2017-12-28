<?php

namespace app\models;

use app\components\base\Model as ModelBase;
use app\components\Application;
use app\components\base\ModelFactory;
use app\components\ModelError;

class Comment extends ModelBase {

    static function create() {
        return ModelFactory::create('Comment');
    }

    public function validate() {

        if (trim($this->name) == '') {
            $this->addError(new ModelError('name', 'Name is required'));
        }
        if (trim($this->remark) == '') {
            $this->addError(new ModelError('remark', 'Remark is required'));
        }

        if ($this->hasErrors()) {
            return false;
        }

        return true;
    }

    static function findByPostId($postId) {

        $conn = Application::app()->db->conn;
        $sql = "SELECT * FROM comment where post_id = ? ORDER BY date_insert DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $postId
        ]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $out = [];
        foreach ($rows as $row) {

            $comment = ModelFactory::create('Comment');
            $comment->loadAttributes($row);
            $input = $result['date_insert'];
            $date = date_create($input);
            $comment->date_insert = date_format($date, 'd.m.Y H:s');

            $out[] = $comment;
        }


        return $out;
    }

    public function insert() {

        if ($this->validate()) {

            $conn = Application::app()->db->conn;
            $sql = " INSERT INTO comment "
                    . " ( name, email, url, remark, post_id ) "
                    . " VALUES  "
                    . " ( ?, ?, ? , ?, ? )";

            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $this->purifier('name'),
                $this->purifier('email'),
                $this->purifier('url'),
                $this->purifier('remark'),
                $this->post_id,
            ]);
            $this->id = $conn->lastInsertId();

            return true;
        }
        return false;
    }

    public function update() {
        
    }

    public static function delete($id) {
        
    }

    public static function find($id) {
        
    }

    public static function findAll() {
        
    }

}
