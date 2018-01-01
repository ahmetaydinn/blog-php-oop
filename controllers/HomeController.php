<?php

namespace app\controllers;

use \app\components\base\Controller as BaseController;
use app\models\Post;

class HomeController extends BaseController {

    public function actionIndex() {

        $posts = Post::findHome();

        $this->render('views/home/index', ['posts' => $posts]);
    }

}
