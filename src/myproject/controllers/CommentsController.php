<?php

namespace myproject\controllers;

use http\Client\Curl\User;
use http\Exception\InvalidArgumentException;
use myproject\Exceptions\Forbidden;
use myproject\Exceptions\LoginExceptions;
use myproject\Exceptions\UnauthorizedException;
use myproject\models\articles\Article;
use myproject\models\comments\Comment;
use myproject\Services\Vardump;

class CommentsController extends AbstractController
{
    public function viewComment($articleId, $commentId)
    {
        $article = Article::getById($articleId);
        $comment = Comment::getById($commentId);
        $error = null;
        $this->view->renderHtml('comments/view.php', ['comment' => $comment, 'article' => $article, 'error' => $error]);
    }

    public function add($articleId)
    {
        if (empty($this->user)) {
            throw new UnauthorizedException('Редактировать комментарии могут только авторизованные юзеры');
        }

        $article = Article::getById($articleId);

        if (!empty($_POST)) {
            try {
                $comment = Comment::createCommentFromArray($_POST, $articleId, $this->user);
            } catch (\myproject\Exceptions\InvalidArgumentException $e) {
                $this->view->renderHtml('comments/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId() . '/comments/' . $comment->getId());
            exit();
        }
        $this->view->renderHtml('comments/add.php', ['article' => $article]);
    }

    public function deleteComment($articleId, $commentId)
    {
        if (empty($this->user)) {
            throw new UnauthorizedException('Редактировать комментарии могут только авторизованные юзеры');
        }

        $comment = Comment::getById($commentId);

        if ($this->user->getId() !== $comment->getAuthorId() and $this->user->getRole() !== 'admin') {
            throw new Forbidden('У вас нет прав на удаление этого комментария');
        }


        if ($commentId == true) {
            $comment->delete();
            header('Location: /');
        }
        return 'Комментарий не найден';
    }

    public function editComment($articleId, $commentId)
    {
        $comment = Comment::getById($commentId);

        if (empty($this->user)) {
            throw new UnauthorizedException('Редактировать комментарии могут только авторизованные юзеры');
        }

        if ($this->user->getRole() != "admin" and $this->user->getId() !== $comment->getAuthorId()) {
            throw new Forbidden('У вас нет прав на редактирования этого комментария');
        }

        if (!empty($_POST)) {
            try {
                $comment->edit($_POST['text']);

            } catch (\myproject\Exceptions\InvalidArgumentException $e) {
                $this->view->renderHtml('comments/edit.php', ['error' => $e->getMessage()]);
                return;
            }
            $test = true;
            $this->view->renderHtml('comments/view.php', ['comment' => $comment, 'test' => $test]);
            exit();
        }
        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);

    }

}