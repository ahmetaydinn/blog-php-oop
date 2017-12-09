<?php

namespace app\controllers;

use \app\components\base\Controller as BaseController;
use app\models\User;

class UserController extends BaseController {

    public function actionList() {
        
        $list = User::findAll([]);

        $this->render('views/user/list', ['list'=>$list]);
    }

}
