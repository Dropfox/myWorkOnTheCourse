<?php
if (!empty($_POST)) {
    require __DIR__ . '/auth.php';

    $login = $_POST ['login'] ?? '';
    $password = $_POST ['password'] ?? '';

    if (checkAuth($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        header('location: /index.php');

    } else {
        $error = 'Ошибка авторизации';
    }
}


?>
<html>
<head>
    <title>Главная страница</title>
</head>
<body>
<?php if (isset($error)): ?>
    <p> <?= $error ?> </p>
<?php endif; ?>
<form action="/MyHomeLessons/Otherры/Other/урок%2095/login.php" method="post">
    <input type="text" name="login">
    <br>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Войти">
</form>
</body>
</html>

