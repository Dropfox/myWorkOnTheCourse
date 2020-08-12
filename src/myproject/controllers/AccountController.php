<?php

namespace myproject\controllers;

use myproject\models\articles\Article;
use myproject\models\comments\Comment;
use myproject\models\users\User;
use myproject\Services\Vardump;

class AccountController extends AbstractController
{
    public function view(int $authorId)
    {
        $check = true;
        $articles = Article::getByAuthorIdCreatedAt($authorId, 'desc');
        $comments = Comment::getByAuthorIdCreatedAt($authorId, 'desc');
        $account = User::getById($authorId);

        $this->view->renderHtml('accounts/Account.php', ['articles' => $articles, 'comments' => $comments, 'check' => $check, 'account' => $account]);
    }
}