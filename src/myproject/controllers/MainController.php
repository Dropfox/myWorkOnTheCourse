<?php

namespace myproject\controllers;


use myproject\models\articles\Article;
use myproject\models\comments\Comment;
use myproject\models\users\User;
use myproject\Services\Db;
use myproject\Services\UsersAuthService;
use myproject\Services\Vardump;
use myproject\view\View;

class MainController extends AbstractController

{
    private $db;

    public function main()
    {
        $articles = Article::findAll();
        $comments = Comment::findAll();

        /*$articles = [
            ['name' => 'Статья 1', 'text' => 'Здесь текст статьи 1'],
            ['name' => 'Статья 2', 'text' => 'Здесь текст статьи 3'],
        ];*/

        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
            'user' => UsersAuthService::getUserByToken(),
            'comments' => $comments,
        ]);
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'страница преветствия', 'getPonos' => ' тут словестный понос']);
    }

    public function sayBye(string $name)
    {
        $this->view->renderHtml('main/bye.php', ['name' => $name]);
    }


}

