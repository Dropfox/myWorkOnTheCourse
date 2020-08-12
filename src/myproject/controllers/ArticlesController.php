<?php

namespace myproject\controllers;

use myproject\Exceptions\Forbidden;
use myproject\Exceptions\InvalidArgumentException;
use myproject\Exceptions\NotFoundException;
use myproject\Exceptions\UnauthorizedException;
use myproject\models\articles\Article;
use myproject\models\comments\Comment;
use myproject\models\users\User;
use myproject\Services\Db;
use myproject\Services\UsersAuthService;
use myproject\Services\Vardump;
use myproject\view\View;

class ArticlesController extends AbstractController
{

    public function view(int $articleId)
    {

        $article = Article::getById($articleId);
        $comments = Comment::findAll();

        $reflector = new \ReflectionObject($article);
        $properties = $reflector->getProperties();
        $propertiesName = [];
        foreach ($properties as $property) {
            $propertiesName [] = $property->getName();
        }


        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'comments' => $comments
        ]);

    }

    public function edit($articleId)
    {

        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin') {
            throw new Forbidden('У вас нет прав админа');
        }

        if (!empty ($_POST)) {
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);

    }

    public function add()
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin') {
            throw new Forbidden('Статьи могут отсылать только пользователи с правами админа');
        }

        if (!empty($_POST)) {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
        $this->view->renderHtml('articles/add.php');

    }

    public function deleteOn($articleId)
    {
        $article = Article::getById($articleId);
        if ($article == true) {
            $article->delete();
            header('Location:/');
        }
        return 'Статья не найдена';
    }

}