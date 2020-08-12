<?php
/* Функции для работы с массивами */

$array1 = [
    'login' => 'admin',
    'password' => 'pass'
];
$array2 = [
    'password' => 'passw'
];

$allArticles = array_merge($array1, $array2);

var_dump($allArticles);

/* дз */
$array = [
    1,
    3,
    2
];
asort($array); /* сортировка */
$string = implode(':', $array); /* преобразование в строку */
echo $string;

$array = [
    1,
    2,
    3,
    4,
    5,
];
var_dump(array_slice($array, 1, 3));