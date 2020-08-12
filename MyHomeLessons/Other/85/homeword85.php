<?php
$dir = scandir(__DIR__ . '/Other');
foreach ($dir as $item) {
    echo $item;
    echo '<br>';
}
