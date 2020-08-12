<?php


if (!empty($_POST)) {
    $newLogin = $_POST['newUser'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';
    require __DIR__ . '/auth.php';
    if (checkAuth($newLogin, $newPassword)) {
        $error = 'имя или пароль уже существуют';
    } else {
        $fileRead = require __DIR__ . '/usersDM.php';
        $fileRead[] = ['login' => $newLogin, 'password' => $newPassword];
        file_put_contents(__DIR__ . '/usersDM.php', $fileRead);
    }
}


?>


<html>
<head>
    <title> Регистрация </title>
</head>
<body>
<?php if (!empty($users)): ?>
    <?php echo $users; ?>
<?php endif; ?>
<?php if (!empty($error)): ?>
    <?= $error ?>
<?php endif; ?>
<form action="/MyHomeLessons/Otherры/Other/урок%2095/registration.php" method="post">
    <a>Логин</a>
    <input type="text" name="newUser">
    <br>
    <a> Пароль</a>
    <input type="password" name="newPassword">
    <br>
    <input type="submit" value="Зарегестрироваться">
</form>
</body>
</html>
