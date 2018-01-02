<?php

namespace app\models;

use app\components\base\Model as BaseModel;
use app\components\Application;
use app\components\base\ModelFactory;
use app\components\ModelError;
use app\components\validators\RequiredValidator;
use app\components\validators\LengthValidator;
use app\components\validators\DateValidator;

/**
 * ORM Representing POST
 */
class Post extends BaseModel {

    public static function create() {
        return ModelFactory::create('Post');
    }

    public function validate() {

        if (!RequiredValidator::isValid($this->title)) {
            $this->addError(new ModelError('title', 'Title is required'));
        }

        if (!LengthValidator::isValid($this->title, ['quantity' => 100])) {
            $this->addError(new ModelError('title', 'Title max size is 100 characters'));
        }

        if (!RequiredValidator::isValid($this->description)) {
            $this->addError(new ModelError('description', 'Description is required'));
        }

        if (!LengthValidator::isValid($this->description, ['quantity' => 3000])) {
            $this->addError(new ModelError('description', 'Description max size is 3000 characters'));
        }

        if (!RequiredValidator::isValid($this->date_publication)) {
            $this->addError(new ModelError('date_publication', 'Publication Date is required'));
        }

        if (!DateValidator::isValid($this->date_publication, ['format' => 'd.m.Y'])) {
            $this->addError(new ModelError('date_publication', 'Publication Date with wrong format (Acept: 01.12.2017)'));
        }

        if ($this->hasErrors()) {
            return false;
        }

        return true;
    }

    static function findHome() {

        $conn = Application::app()->db->conn;
        $sql = 'SELECT p.id as id, p.title as title,'
                . ' p.description as description, '
                . ' date_insert, a.name as author '
                . ' FROM post p, author a '
                . ' WHERE p.author_id = a.id and p.date_publication < NOW()'
                . ' ORDER BY date_publication desc';

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $out = [];
        foreach ($rows as $row) {

            $post = ModelFactory::create('Post');
            $post->loadAttributes($row);

            $post->comments = [];
            $comments = Comment::findByPostId($post->id);
            $post->comments = $comments;
            $out[] = $post;
        }


        return $out;
    }

    static function delete($id) {

        $conn = Application::app()->db->conn;
        $sql = 'DELETE FROM user WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function isOwner($authorId) {

        if ($this->author_id == $authorId) {
            return true;
        }
        return false;
    }

    public function save() {

        if ($this->validate()) {

            if (!$this->id) {
                $conn = Application::app()->db->conn;
                $sql = " INSERT INTO post "
                        . " ( title, description, date_publication, author_id ) "
                        . " VALUES  "
                        . " (?,?,?,?)";
                // USES prepared statements to avoid sql injection
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    // TO AVOID XSS ATTACKS, APPLY FILTERS
                    filter_var($this->title, FILTER_SANITIZE_STRING),
                    filter_var($this->description, FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    $this->date_publication,
                    $this->author_id
                ]);
                $this->id = $conn->lastInsertId();
            } else {

                $conn = Application::app()->db->conn;
                $sql = " UPDATE post SET "
                        . " title=?, description=?, date_publication=?, author_id=? "
                        . " WHERE id=?;";
                // USES prepared statements to avoid sql injection
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    // TO AVOID XSS ATTACKS, APPLY FILTERS
                    filter_var($this->title, FILTER_SANITIZE_STRING),
                    filter_var($this->description, FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    $this->date_publication,
                    $this->author_id,
                    $this->id
                ]);
            }

            return true;
        }
        return false;
    }

    public static function find($id) {

        $conn = Application::app()->db->conn;
        $sql = 'SELECT p.id as id, p.title as title, ' .
                ' p.description as description, date_insert, ' .
                ' DATE_FORMAT(p.date_publication, "%d.%m.%Y") as date_publication, ' .
                ' a.id as author_id, a.name as author ' .
                ' FROM post p, author a ' .
                ' where p.author_id = a.id and p.id =:id ' .
                ' ORDER BY date_insert DESC ';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $post = ModelFactory::create('Post');
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $post->loadAttributes($result);

        $post->comments = [];
        $comments = Comment::findByPostId($post->id);
        $post->comments = $comments;

        return $post;
    }

}
