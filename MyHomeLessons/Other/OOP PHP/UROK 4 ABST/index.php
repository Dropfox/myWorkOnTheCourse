<?php

abstract class AbstractClass
{
    abstract public function getValue();

    public function printValue()
    {
        echo 'заначение' . $this->getValue();
    }
}

class classA extends AbstractClass
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value; // TODO: Implement getValue() method.
    }
}

$objectA = new classA('kek');


abstract class HumanAbstract
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;

    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }

}

class RussianHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Привет';
    }

    public function getMyNameIs(): string
    {
        return 'Меня зовут';
    }
}

class EnglishHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Hello';
    }

    public function getMyNameIs(): string
    {
        return 'My name is';
    }
}

$humanR = new RussianHuman('Гриша');
$humanE = new EnglishHuman('Grigory');
echo $humanR->introduceYourself();
echo '<br>';
echo $humanE->introduceYourself();
echo '<br>';
echo $humanR->getGreetings() . ' ' . $humanE->getName();
echo '<br>';
echo $humanE->getGreetings() . ' ' . $humanR->getName();
