<?php

abstract class AbstractClass
{
    private $name1;
    private $name2;

    public function __construct($name1, $name2)
    {
        $this->name1 = $name1;
        $this->name2 = $name2;
    }

    public function getName1(): string
    {
        return $this->name1;
    }

    public function getName2(): string
    {
        return $this->name2;
    }

    abstract public function getHello();

    abstract public function getHelloToo();

    public function setName1($name1)
    {
        $this->name1 = $name1;
    }
}

class Greeting extends AbstractClass
{

    public function getHello()
    {
        return 'Hello';
    }

    public function getHelloToo()
    {
        return 'Hello you too';
    }

    public function getting()
    {
        echo $this->getHello() . ' ' . $this->getName1();
        echo '<br>';
        echo $this->getHelloToo() . ' ' . $this->getName2();
    }

}

$object1 = new Greeting('Masha', 'Grisha');
$object1->setName1('lolo');
echo $object1->getting();
