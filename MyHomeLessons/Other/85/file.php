<?php
$files = scandir(__DIR__ . '/Other');

foreach ($files as $dir) {
    if (!is_dir($dir)) {
        echo $dir;
        echo '<br>';
    }

}