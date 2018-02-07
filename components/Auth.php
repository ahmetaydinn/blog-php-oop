<?php

namespace app\components;

use app\components\base\Auth as BaseAuth;
use app\components\ModelError;
use app\components\validators\RequiredValidator;
use app\components\validators\LengthValidator;
use app\models\Author;

/**
 * Class responsable to Autentication proccess and handle session of auth.
 * 
 * @author victor.leite@gmail.com
 */
class Auth extends BaseAuth {

    public $defaultPage = 'home/login';

    public static function create() {
        return new Auth();
    }

    public function validate() {

        if (!RequiredValidator::isValid($this->login)) {
            $this->addError(new ModelError('login', 'Login is required'));
        }

        if (!LengthValidator::isValid($this->login, ['quantity' => 100])) {
            $this->addError(new ModelError('login', 'Login max size is 100 characters'));
        }

        if (!RequiredValidator::isValid($this->password)) {
            $this->addError(new ModelError('password', 'Password is required'));
        }

        if (!LengthValidator::isValid($this->password, ['quantity' => 100])) {
            $this->addError(new ModelError('password', 'Password max size is 100 characters'));
        }

        if ($this->hasErrors()) {
            return false;
        }

        return true;
    }
    /**
     * Login the user based on login and password parameters 
     * @return boolean
     */
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
    /**
     * Check if the user are logged or not.
     * @return boolean
     */
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
    /**
     * Create Session within the parameters of auth.
     */
    private function setSession() {

        $_SESSION['id'] = $this->id;
        $_SESSION['login'] = $this->login;
        $_SESSION['password'] = $this->password;
    }
    /**
     * Returns the session based on the key
     * @param type $key
     * @return type
     */
    static function getSession($key) {
        return $_SESSION[$key];
    }
    /**
     * Kill the session instances.
     */
    static function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }

}
