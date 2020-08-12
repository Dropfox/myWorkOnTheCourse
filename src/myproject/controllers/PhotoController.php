<?php

namespace myproject\controllers;

use myproject\Exceptions\Forbidden;
use myproject\Exceptions\InvalidFileLoaded;
use myproject\Exceptions\UnauthorizedException;
use myproject\models\users\User;
use myproject\Services\Vardump;

class PhotoController extends AbstractController
{

    public function photoAdd()
    {

        if (empty($this->user)) {
            throw new UnauthorizedException();
        }
        if (empty($_FILES)) {
            throw new Forbidden();
        }

        try {
            $photo = $this->user->addAvatar($_FILES['attachment']);
            header('Location:/user/' . $this->user->getId() . '/account');
            exit();
        } catch (InvalidFileLoaded $e) {
            $this->view->renderHtml('photos/add.php', ['error' => $e->getMessage()]);
        }

    }
}