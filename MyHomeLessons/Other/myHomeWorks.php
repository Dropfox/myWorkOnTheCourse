<?php


function getSmaller(float $x, float $y, float $z)
{
    if ($x < $y & $x < $z) {
        return $x;
    } elseif ($y < $x & $y < $z) {
        return $y;
    }
    return $z;
}

echo getSmaller(2, 5, 6);

echo '<br>';

function getDouble(&$x, &$y)
{
    $sumX = $x * 2;
    $sumY = $y * 2;
    return 'удвоенное значение равно: ' . "$sumX и $sumY";
}

$a = 5;
$b = 12;
echo getDouble($a, $b);


echo '<br>';

function factorial(int $a)
{
    if ($a == 1) {
        return $a;
    }
    return $a * factorial($a - 1);

}

$b = 4;
echo factorial($b);


echo '<br>';

function paste($x)
{
    if ($x == 1) {
        return $x;
    }
    return "$x " . paste($x - 1);
}

$b = 7;
echo paste($b);