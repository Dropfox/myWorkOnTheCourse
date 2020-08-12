<?php

class Post
{
    protected $title;
    protected $text;

    function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    function setTitle($title): string
    {
        $this->title = $title;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setText($text): string
    {
        $this->text = $text;
    }

    function getText()
    {
        return $this->text;
    }
}

$newPost = new Post('hello', 'world');
var_dump($newPost);

echo '<br>';
echo '<br>';
echo '<br>';

class Homework extends Post
{
    protected $homework;

    function __construct($title, $text, $homework)
    {
        parent::__construct($title, $text);
        $this->homework = $homework;
    }

    function getHomework()
    {
        return $this->homework;
    }

    function setHomework($Homework): string
    {
        $this->homework = $Homework;
    }
}

$newHomework = new Homework('Заголовок', 'Привет Медвед', 'Сделать задачу номер 2');
var_dump($newHomework);
echo '<br>';
echo '<br>';
echo '<br>';

class Price extends Homework
{
    protected $price;

    function __construct($title, $text, $homework, $price)
    {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    function getPrice()
    {
        return $this->price;
    }

    function setPrice($price): float
    {
        $this->price = $price;
    }
}

$newPrice = new Price('Урок о наследовании PHP', 'Лол, кек, чебурек', 'Ложитесь спать, утро вечера мудренее', 99);

var_dump($newPrice);
