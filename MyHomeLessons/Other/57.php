<?php
$sum = 0;
for ($i = 0; $i <= 100000; $i++) {
    $sum = $sum + $i;
}
echo $sum;

die();

/* домашнее задание */
/* задание 1*/
for ($i = 1000; $i < 10000; $i++) {
    if ($i % 17 == 0) {
        echo $i . '<br>';
    }
}

/* задание 2 */
$arr = [0, 1];
$prev = 0;

for ($i = 1; $i <= 100000;) {
    $i += $prev;
    $prev = $i - $prev;
    if ($i <= 100000) {
        $arr [] = $i;
    }
}
var_dump($arr);