<?php
require __DIR__ . '/auth.php';
$login = getUserLogin();
?>

<html>
<head>
    <title> Главная страница</title>
</head>
<body>
<?php if ($login !== null): ?>
    Добро пожаловать, <?= $login ?> <br>
    <a href="/MyHomeLessons/Other/урок%2082/logout.php%2082/logout.php">выйти из аккаунта</a>
<?php else: ?>
    <a href="/MyHomeLessons/Other/урок%2082/login.phpк%2082/login.php">Авторезуйтесь</a>
<?php endif; ?>
</body>
</html>