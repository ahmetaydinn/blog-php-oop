<?php

namespace app\components;

use app\components\base\Base;
use \app\components\base\iAuth;
use app\components\ModelError;
use app\models\Author;

class Auth extends Base implements iAuth {

    public $defaultPage = 'home/autentication';

    public static function create() {
        return new Auth();
    }

    public function validate() {
        if (trim($this->login) == '') {
            $this->addError(new ModelError('name', 'Login is required'));
        }
        if (trim($this->password) == '') {
            $this->addError(new ModelError('remark', 'Password is required'));
        }

        if ($this->hasErrors()) {
            return false;
        }

        return true;
    }

    public function login() {

        $author = Author::findByUserName($this->login);
        $this->id = $author->id;

        if (null !== $author) {
            if ($author->password === $this->password) {
                $this->setSession();
                return true;
            }
        }
        $this->addError(new ModelError('username', 'Login or Password not founded'));
        return false;
    }

    static function isLogged() {

        if (!isset($_SESSION['id'])) {
            return false;
        }
        if (!isset($_SESSION['login'])) {
            return false;
        }
        if (!isset($_SESSION['password'])) {
            return false;
        }

        return true;
    }

    private function setSession() {

        $_SESSION['id'] = $this->id;
        $_SESSION['login'] = $this->login;
        $_SESSION['password'] = $this->password;
    }

    static function getSession($key) {
        return $_SESSION[$key];
    }

    static function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }

}
