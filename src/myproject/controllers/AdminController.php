<?php

namespace myproject\controllers;

use http\Exception\InvalidArgumentException;
use myproject\Exceptions\InvalidAdminException;
use myproject\Exceptions\UnauthorizedException;
use myproject\models\articles\Article;
use myproject\models\comments\Comment;
use myproject\models\users\User;
use myproject\Services\Vardump;

class AdminController extends AbstractController
{
    public function view()
    {
        if (empty($this->user)) {
            throw new UnauthorizedException();
        }

        $articles = Article::reduceTextToNumber(Article::findLimit(3, 'created_at', 'desc'), 50);

        $comments = Comment::reduceTextToNumber(Comment::findLimit(3, 'created_at', 'desc'), 100);


        $error = null;

        if ($this->user->getRole() === 'admin') {
            $this->view->renderHtml('/admin/Admin.php', ['articles' => $articles,
                'comments' => $comments,
                'error' => $error,
            ]);
        } else {
            throw new InvalidAdminException();
        }
    }
}