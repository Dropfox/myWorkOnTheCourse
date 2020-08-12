<?php
$arr = [];
$x = 345;

while ($x <= 357) {
    if ($x % 2 == 0) {
        $arr [] = $x;
    }
    $x++;
}
foreach ($arr as $key => $value) {
    $key++;
    echo "$key= " . $value . '<br>';
}