<?php

namespace app\models;

use app\components\base\Model as ModelBase;
use app\components\Application;
use app\components\base\ModelFactory;
use app\components\ModelError;
use app\components\validators\RequiredValidator;
use app\components\validators\EmailValidator;
use app\components\validators\UrlValidator;
use app\components\validators\LengthValidator;

class Comment extends ModelBase {

    static function create() {
        return ModelFactory::create('Comment');
    }

    public function validate() {

        if (!RequiredValidator::isValid($this->name)) {
            $this->addError(new ModelError('name', 'Name is required'));
        }

        if (!LengthValidator::isValid($this->name, ['quantity' => 100])) {
            $this->addError(new ModelError('name', 'Name max size is 100 characters'));
        }

        if (!RequiredValidator::isValid($this->remark)) {
            $this->addError(new ModelError('remark', 'Remark is required'));
        }

        if (!LengthValidator::isValid($this->remark, ['quantity' => 3000])) {
            $this->addError(new ModelError('remark', 'Remark max size is 3000 characters'));
        }

        if (!EmailValidator::isValid($this->email)) {
            $this->addError(new ModelError('email', 'Email invalid'));
        }

        if (!LengthValidator::isValid($this->email, ['quantity' => 100])) {
            $this->addError(new ModelError('email', 'Email max size is 100 characters'));
        }

        if (!UrlValidator::isValid($this->url)) {
            $this->addError(new ModelError('url', 'Url invalid'));
        }

        if (!LengthValidator::isValid($this->url, ['quantity' => 100])) {
            $this->addError(new ModelError('email', 'Url max size is 100 characters'));
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
            $out[] = $comment;
        }


        return $out;
    }

    public function save() {

        if ($this->validate()) {

            if (!$this->id) {

                $conn = Application::app()->db->conn;
                $sql = " INSERT INTO comment "
                        . " ( name, email, url, remark, post_id ) "
                        . " VALUES  "
                        . " ( ?, ?, ? , ?, ? )";
                // USES prepared statements to avoid sql injection
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    // TO AVOID XSS ATTACKS, APPLY FILTERS
                    filter_var($this->name, FILTER_SANITIZE_STRING),
                    filter_var($this->email, FILTER_SANITIZE_EMAIL),
                    filter_var($this->url, FILTER_SANITIZE_URL),
                    filter_var($this->remark, FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    $this->post_id,
                ]);
                $this->id = $conn->lastInsertId();
            } else {

                // Implement UPDATE here
            }

            return true;
        }
        return false;
    }

    public static function delete($id) {
        // Implement DELETE here
    }

    public static function find($id) {
        // Implement FIND here
    }

}
