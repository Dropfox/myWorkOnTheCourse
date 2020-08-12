/* index.php */
<html>
<head>
    <title>Знакомство с Get запросом</title>
</head>
<body>
<table>
    <form action="/MyHomeLessons/Other/login.php" method="get">
        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit" value="Войти">
    </form>

</table>

</body>
</html>

/* login.php */


<?php
$login = !empty($_GET['login']) ? $_GET['login'] : null;
$password = !empty($_GET['password']) ? $_GET['password'] : null;
if ($login === 'admin' && $password === 'password') {
    $autorized = 'логин -' . $login . '<br>' . 'пароль -' . $password;
} elseif ($login !== 'admin') {
    $autorized = 'такого логина не существует';
} elseif ($login === 'admin' && $password !== 'password') {
    $autorized = 'Пароль не верный';
}

?>

<html>
<head>
    <title>Знакомство с Get запросом</title>
</head>
<body>
<?= $autorized ?>
</body>
</html>

/* собственное решение php */

<?php
$login = $_GET['login'];
$password = $_GET['password'];

function userVerification(string $userName, string $userPassword)
{
    $usersArray = [
        'user1' => 'password1',
        'user2' => 'password2'
    ];
    if (array_key_exists($userName, $usersArray)) {
        if ($usersArray [$userName] === $userPassword) {
            return 'Логин: ' . $userName . '<br>' . 'Пароль: ' . $userPassword;
        } else {
            return 'пароль не верный';
        }
    } else {
        return 'Данного аккаунта не существует';
    }
}

?>
<html>
<head>
    <title>Знакомство с Get запросом</title>
</head>
<body>
<?= userVerification($login, $password) ?>
</body>
</html>
