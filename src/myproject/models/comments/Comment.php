<?php

namespace myproject\models\comments;

use http\Exception\InvalidArgumentException;
use myproject\models\ActiveRecordEntity;
use myproject\models\articles\Article;
use myproject\models\users\User;
use myproject\Services\Vardump;

class Comment extends ActiveRecordEntity
{
    protected $authorId;
    protected $articleId;
    protected $text;
    protected $createdAt;

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getAuthor()
    {
        return User::getById($this->getAuthorId());
    }

    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public static function createCommentFromArray($field, $articleId, User $user)
    {
        if (empty($field)) {
            throw new \myproject\Exceptions\InvalidArgumentException('вы не указали текст комментария');
        }

        $comment = new Comment();

        $comment->setText($field['text']);
        $comment->setAuthorId($user->getId());
        $comment->setArticleId($articleId);

        $comment->save();

        return $comment;
    }

    public function edit($fields)
    {
        if (empty($fields)) {
            throw new \myproject\Exceptions\InvalidArgumentException('Вы не указали текст комментария');
        }

        if ($fields === $this->getText()) {
            throw new \myproject\Exceptions\InvalidArgumentException('Вы не изменили текст комментария');
        }
        $this->setText($fields);
        $this->save();
    }


}