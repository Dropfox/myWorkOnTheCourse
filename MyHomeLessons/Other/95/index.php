<?php
require __DIR__ . '/auth.php';
$login = getUserLogin();

$files = scandir(__DIR__ . '/uploads');
$links = [];
foreach ($files as $filename) {
    if ($filename === '.' || $filename === '..') {
        continue;
    }
    $links [] = 'http://myproject.loc/uploads/' . $filename;
}

?>

<html>
<head>
    <title>Фотоальбом</title>
</head>
<body>

<?php if (getUserLogin() != null): ?>
    <p> Фотоальбом <?= $login ?> :</p>
    <br>

    <?php foreach ($links as $link): ?>
        <img src="<?= $link ?>" height="80px">
    <?php endforeach; ?>

<?php else: ?>
    <a href="/MyHomeLessons/Other/урок%2095/login.phpк%2095/login.php">Авторизуйтесь</a>
<?php endif; ?>
<br>
<?php if (getUserLogin() === null): ?>
    <a href="/MyHomeLessons/Other/урок%2095/registration.phpregistration.php">Зарегистрироваться</a>
<?php endif; ?>
<?php if (!empty($_COOKIE)): ?>
    <a href="logout.php">Выйти</a>
    <br>
<?php endif; ?>

</body>
</html>
