<?php

interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Circle implements CalculateSquare
{
    const PI = 3.14;

    private $r;

    public function __construct($r)
    {
        $this->r = $r;
    }

    public function calculateSquare(): float
    {
        return self::PI * ($this->r ** 2);
    }
}

class Square implements CalculateSquare
{
    private $x;

    public function __construct($x)
    {
        $this->x = $x;
    }

    public function calculateSquare(): float
    {
        return $this->x ** 2;
    }
}

class Rectangle
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }
}

$objects = [
    new Square(3),
    new Rectangle(2, 3),
    new Circle(5),
];
foreach ($objects as $object) {
    if ($object instanceof CalculateSquare) {
        echo 'Объект содержит CalculateSquare. Площадь:' . $object->calculateSquare();
        echo '<br>';
        echo 'Объект пренадлежит классу: ' . get_class($object);
        echo '<br>';
        echo '<br>';
    } else {
        echo 'Объект класса: ' . get_class($object) . ' не реализует интерфейс CalculateSquare.';
        echo '<br>';
        echo '<br>';
    }

}

