<?php


class User
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Article
{
    private $text;
    private $title;
    private $author;

    public function __construct($title, $text, $author)
    {
        $this->text = $text;
        $this->title = $title;
        $this->author = $author;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }
}

$user1 = new User('Falos');
$article1 = new Article('gaga', 'hasfherwh', $user1);
echo $article1->getTitle() . ', ' . $article1->getText() . ', ' . $article1->getAuthor()->getName();
