<?php

namespace app\controllers;

use \app\components\base\Controller as BaseController;
use app\models\User;

class UserController extends BaseController {

    public function actionList() {

        $users = User::findAll();
        $this->render('views/user/list', ['users' => $users]);
    }

    public function actionCreate() {

        $model = User::create();

        // Postback
        if (isset($_POST['user'])) {
            $model->loadAttributes($_POST['user']);
            if ($model->insert()) {
                $this->redirect('user/view&id=' . $model->id);
            }
        }
        $this->render('views/user/create', ['model' => $model]);
    }

    public function actionUpdate() {

        $id = $_GET['id'];
        $model = User::find($id);

        // Postback
        if (isset($_POST['user'])) {
            $model->loadAttributes($_POST['user']);
            if ($model->update()) {
                $this->redirect('user/view&id=' . $model->id);
            }
        }

        $this->render('views/user/update', ['model' => $model]);
    }

    public function actionView() {

        $id = $_GET['id'];
        $model = User::find($id);
        $this->render('views/user/view', ['model' => $model]);
    }

    public function actionDelete() {

        // In the future do that as POST request Method
        // TODO delete

        $this->redirect('user/list');
    }

}
