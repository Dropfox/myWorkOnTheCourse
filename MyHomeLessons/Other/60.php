<?php
for ($i = 1; $i <= 20; $i++) {
    if ($i % 3 === 0) {
        continue;
    }
    echo $i;
    echo '<br>';
}

/* Домашнее задание */


$array = [];
$number = 0;
function numberFound($array, $number)
{
    $result = 0;
    foreach ($array as $item) {
        if ($item === $number) {
            $result++;
        }
        continue;
    }
    return $result;
}

echo numberFound([5, 3, 2, 2, 2, 2], 2);