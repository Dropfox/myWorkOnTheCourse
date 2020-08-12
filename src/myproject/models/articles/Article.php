<?php

namespace myproject\models\articles;

use myproject\Exception\InvalidArgumentException;
use myproject\Exceptions\Forbidden;
use myproject\Exceptions\UnauthorizedException;
use myproject\Models\ActiveRecordEntity;
use myproject\models\users\User;
use myproject\Services\Vardump;

class Article extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;

    protected static function getTableName(): string
    {
        return 'articles';
    }

    public function getName()
    {
        return $this->name;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAuthor()
    {
        return User::getById($this->authorId);
    }

    public function setName($newName)
    {
        $this->name = $newName;
    }

    public function setText($newText)
    {
        $this->text = $newText;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public static function createFromArray($fields, User $author)
    {
        if (empty($fields['name'])) {
            throw new \myproject\Exceptions\InvalidArgumentException('Вы не указали название статьи');
        }
        if (empty($fields['text'])) {
            throw new \myproject\Exceptions\InvalidArgumentException('Напишите текст для статьи');
        }

        $article = new Article();

        $article->setAuthorId($author->getId());
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();

        return $article;
    }

    public function updateFromArray(array $fields)
    {

        if (empty($fields['name'])) {
            throw new \myproject\Exceptions\InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new \myproject\Exceptions\InvalidArgumentException('Не передан текст для статьи');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;
    }

}
