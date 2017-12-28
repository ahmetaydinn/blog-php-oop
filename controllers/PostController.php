<?php

namespace app\controllers;

use \app\components\base\Controller as BaseController;
use \app\components\base\ModelFactory;
use app\models\Post;
use app\models\Auth;

class PostController extends BaseController {

    static function actionDetail() {
        $id = $_GET['id'];

        $comment = ModelFactory::create('Comment');

        // Postback
        if ($_POST['comment']) {

            $comment = ModelFactory::create('Comment');
            $comment->loadAttributes($_POST['comment']);
            $comment->post_id = $id;
            if ($comment->insert()) {
                //Set a flash message here.
                self::redirect('index.php?page=post&method=detail&id=' . $id);
            }
        }
        $post = \app\classes\models\Post::findPost($id);

        self::render('post/detail', ['post' => $post, 'comment' => $comment]);
    }

    static function actionDelete() {

        //TODO CHANGE It TO POST
        $id = $_GET['id'];
        $authorId = Auth::getSession('id');
        // check auth
        if (Post::isOwner($postId, $authorId)) {
            Post::delete($id);
        }

        self::redirect('index.php');
    }

}
