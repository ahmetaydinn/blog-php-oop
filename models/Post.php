<?php

namespace app\classes\models;

use app\classes\App;
use app\classes\base\ModelFactory;

class Post extends \app\classes\base\ModelBase {

    public static function create() {
        return ModelFactory::create('Post');
    }

    public function validate() {
        
    }

    static function findHome($limit = 3) {

        $conn = App::app()->db->conn;
        $sql = 'SELECT p.id as id, p.title as title,'
              .' p.description as description, '
              .' date_insert, a.name as author '
              .' FROM post p, author a '
              .' WHERE p.author_id = a.id '
              .' ORDER BY date_insert DESC LIMIT :limit ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $out = [];
        foreach ($rows as $row) {

            $post = ModelFactory::create('Post');
            $post->loadAttributes($row);

            $input = $row['date_insert'];
            $date = date_create($input);
            $post->date_insert = date_format($date, 'd.m.Y');

            $post->comments = [];
            $comments = Comment::findByPostId($post->id);
            $post->comments = $comments;
            $out[] = $post;
        }


        return $out;
    }

    static function findPost($postId) {

        $conn = App::app()->db->conn;
        $sql = 'SELECT p.id as id, p.title as title, p.description as description, date_insert, a.id as author_id, a.name as author FROM post p, author a where p.author_id = a.id and p.id =:id ORDER BY date_insert DESC';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $postId);
        $stmt->execute();

        $post = ModelFactory::create('Post');
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $post->loadAttributes($result);

        $input = $result['date_insert'];
        $date = date_create($input);
        $post->date_insert = date_format($date, 'd.m.Y');

        $post->comments = [];
        $comments = Comment::findByPostId($post->id);
        $post->comments = $comments;

        return $post;
    }
    
    static function delete($id) {

        $conn = App::app()->db->conn;
        $sql = 'DELETE FROM user WHERE id = :id';
        die($sql);
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    
    static function isOwner($postId, $authorId) {
        
        $post = self::findPost($postId);
        self::debug($post);
        if($post->author_id == $authorId){
            return true;
        }
        return false;
    }

}
