<?php

require_once __DIR__ . '/config.php'; /* once- подключает директиву только 1 раз для 1 файла*/
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/config.php';

$content = file_get_contents(__DIR__ . '/news1.txt');/*Вставить контент внутри $content = '<h1>Заголовок страницы</h1> Содержимое страницы';*/

require __DIR__ . '/header.php';
require __DIR__ . '/sidebar.php';
require __DIR__ . '/content.php';
require __DIR__ . '/footer.php';




<html>
<head>
    <title> Пример подключения файлов</title>
    <style> table, td {
    border: solid 1px black;
            border-collapse: collapse;
        }
       table {
    width: 800px;
           margin: auto;
        }
        #sidebar {
            width: 200px;
        }
        td {
    padding: 20px;
        }

    </style>
</head>
<body>
<table>
    <tr>
        <td colspan="2">header</td>
    </tr>
    <tr>


<td id="sidebar">sidebar</td>


<td><?= $content ?></td>


</tr>
<tr>
    <td colspan="2">footer</td>
</tr>
</table>
</body>
</html>