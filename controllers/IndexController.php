<?php

namespace app\controller;

use \app\components\base\Controller as BaseController;

class IndexController extends BaseController {

    public function actionIndex() {

        $this->render('home');
    }

}
