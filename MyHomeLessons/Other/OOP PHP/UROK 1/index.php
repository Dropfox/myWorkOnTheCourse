<?php

class Cat
{
    private $name;
    private $color;
    public $weight;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello()
    {
        echo 'Привет, меня зовут ' . $this->name . '<br>';
        echo 'Цвет моей шерстки: ' . $this->color . '<br><br>';
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}

$cat1 = new Cat('Снежок', '-желтый');
$cat1->sayHello();
$cat1->setName('Бидон');
echo $cat1->sayHello();
$cat2 = new Cat('Барсик', 'Белый');
echo $cat2->sayHello();