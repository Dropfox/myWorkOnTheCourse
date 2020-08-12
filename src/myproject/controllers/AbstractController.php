<?php

namespace myproject\controllers;

use myproject\Models\users\User;
use myproject\Services\UsersAuthService;
use myproject\view\View;

abstract class AbstractController
{
    protected $view;
    protected $user;

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../../../tamplates');
        $this->view->setVar('user', $this->user);
    }
}