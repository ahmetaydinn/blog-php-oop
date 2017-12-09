<?php

namespace app\controllers;

use \app\components\base\Controller as BaseController;

class HomeController extends BaseController {

    public function actionIndex() {

        $this->render('views/index/home', []);
    }

}
