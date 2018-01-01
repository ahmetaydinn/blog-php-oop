<?php

namespace app\controllers;

use \app\components\base\Controller as BaseController;
use \app\components\base\ModelFactory;
use app\models\Post;
use app\components\Auth;

class PostController extends BaseController {

    protected function beforeAction($actionName) {
        parent::beforeAction($actionName);

        if ($actionName == 'actionCreate') {
            // check authentication
        }

        if ($actionName == 'actionDelete') {
            // check authentication
        }
    }

    public function actionDetail() {
        $id = $_GET['id'];

        $comment = ModelFactory::create('Comment');

        // Postback
        if ($_POST['comment']) {

            $comment = ModelFactory::create('Comment');
            $comment->loadAttributes($_POST['comment']);
            $comment->post_id = $id;
            if ($comment->insert()) {
                //Set a flash message here.
                $this->redirect('post/detail&id=' . $id);
            }
        }
        $post = Post::find($id);

        $this->render('views/post/detail', ['post' => $post, 'comment' => $comment]);
    }

    public function actionCreate() {

        $post = ModelFactory::create('Post');

        // Postback
        if ($_POST['post']) {
            
            $post = ModelFactory::create('Post');
            $post->loadAttributes($_POST['post']);
            $post->author_id = 1;
            if ($post->insert()) {
                //Set a flash message here.
                $this->redirect('post/detail&id=' . $post->id);
            }
        }
        $this->render('views/post/create', ['post' => $post]);
    }
    
    public function actionUpdate() {

        $id = $_GET['id'];
        $post = Post::find($id);
                
        // Postback
        if ($_POST['post']) {
            
            $post->loadAttributes($_POST['post']);
            $post->author_id = 1;
            if ($post->update()) {
                //Set a flash message here.
                $this->redirect('post/detail&id=' . $post->id);
            }
        }
        $this->render('views/post/update', ['post' => $post]);
    }

    public function actionDelete() {

        //TODO CHANGE It TO POST
        $id = $_GET['id'];
        $authorId = Auth::getSession('id');
        // check auth
        if (Post::isOwner($postId, $authorId)) {
            //Post::delete($id); 
        }

        $this->redirect('home/index');
    }

}
