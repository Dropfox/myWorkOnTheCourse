<?php

$carsSpeeds = [
    95,
    140,
    78,
    2,
    1
];

$sumOfSpeeds = 0;

foreach ($carsSpeeds as $key => $carsSpeed) {
    $sumOfSpeeds += $carsSpeed;
    $sumOfKey += $key;
}

echo $sumOfKey;
echo 'средняя скорость движения авто= ' . $sumOfSpeeds / count($carsSpeeds);

/* Или такой вариант */
die();

$carsSpeeds = [
    95,
    140,
    78,
    2
];

$sumOfSpeeds = 0;
$sumOfkey = 0;

foreach ($carsSpeeds as $carsSpeed) {
    $sumOfSpeeds += $carsSpeed;
    $sumOfkey++;
}

echo $sumOfSpeeds / $sumOfkey;
