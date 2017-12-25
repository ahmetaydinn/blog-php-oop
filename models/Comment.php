<?php

namespace app\classes\models;

use app\classes\App;
use app\classes\base\ModelFactory;
use app\classes\ModelError;

class Comment extends \app\classes\base\ModelBase {

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

        $conn = App::app()->db->conn;
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

            $conn = App::app()->db->conn;
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

}
