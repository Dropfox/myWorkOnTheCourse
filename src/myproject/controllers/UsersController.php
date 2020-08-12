<?php

namespace myproject\controllers;

use myproject\Exceptions\ActivateExceptions;
use myproject\Exceptions\InvalidArgumentException;
use myproject\Exceptions\LoginExceptions;
use myproject\models\users\User;
use myproject\models\users\UserActivationService;
use myproject\Services\Db;
use myproject\Services\EmailSender;
use myproject\Services\UsersAuthService;
use myproject\Services\Vardump;
use myproject\view\View;

class UsersController extends AbstractController
{
    private $db;

    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }

            if ($user instanceof User) {
                $code = UserActivationService::createActivationCode($user);

                EmailSender::send($user, 'Активация', 'userActivation.php', [
                    'userId' => $user->getId(),
                    'code' => $code
                ]);
                $this->view->renderHtml('users/signUpSuccessful.php');
                return;
            }
        }

        $this->view->renderHtml('users/signUp.php');
    }

    public function activate(int $userId, string $activationCode)
    {

        try {
            $user = User::getById($userId);

            if ($user->getIsConfirmed() == 1) {
                throw new ActivateExceptions('Пользователь с именем ' . $user->getEmail($userId) . ' уже активирован');
            }
            if ($user === null) {
                throw new ActivateExceptions('такого пользователя не существует');
            }

            $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
            if ($isCodeValid) {
                $user->activate();

                UserActivationService::deleteCode($userId, $activationCode);
                $this->view->renderHtml('users/signUpSuccessful.php', ['activate' => true]);
            } else {
                throw new ActivateExceptions('Активация не возможна');
            }
        } catch (ActivateExceptions $e) {
            $this->view->renderHtml('errors/ActivationProblem.php', ['error' => $e->getMessage()]);
        }
    }

    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /');
                exit();
            } catch (LoginExceptions $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('users/login.php');
    }

    public function logout()
    {
        setcookie('token', '', -10, '/', '', false, true);
        header('Location: /');
    }

}