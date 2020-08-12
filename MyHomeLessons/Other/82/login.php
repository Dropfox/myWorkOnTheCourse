<?php
if (!empty($_COOKIE)){
    header('location:/index.php');
} else {
    if (!empty($_POST)) {
        require __DIR__ . '/auth.php';

        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        if (checkAuth($login, $password)) {
            setcookie('login', $login, 0, '/');
            setcookie('password', $password, 0, '/');
            header('location: /index.php');
        } else {
            $error = 'ошибка авторизации';
        }
    }
}
?>


<html>
    <head>
        <title> Страница входа</title>
    </head>
    <body>
    <?php if (isset($error)): ?>
    <span><?= $error ?></span>
    <?php endif; ?>
    <form action="/MyHomeLessons/Otherры/Other/урок%2082/login.php" method="post">
        <input type="text" name="login">
        <br>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Войти">
    </form>
    </body>
</html>