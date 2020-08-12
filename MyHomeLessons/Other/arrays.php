<?php

$article = [
    'title' => 'какой-то заголовок',
    'text' => 'Какой-то текст',
    'author' => [
        'firstName' => 'Имя',
        'lastName' => 'Фамилия'
    ]
];
die();

?>


<html>
<head>
    <title> <?= $article['title'] ?></title>
</head>
<body>
<h1> <?= $article['title'] ?></h1>
<p> <?= $article['text'] ?> </p>
<p> <?= $article['author'] ['firstName'] ?> <?= $article['author'] ['lastName'] ?> </p>
</body>
</html>
