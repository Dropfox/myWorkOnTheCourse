<?php
$pattern = '/\/([a-zA-Z]+)\/([0-9]+)/';
$url1 = '/post/892';
preg_match($pattern, $url1, $matches);

$controller = $matches [1];
$id = $matches [2];
echo '/' . $controller . '/' . $id;
