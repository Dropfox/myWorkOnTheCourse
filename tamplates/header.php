<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> <?= $title ?? 'Мой блог' ?> </title>
    <link rel="stylesheet" href="/style.css">
</head>
<body style="background: url(/../src/img/2.jpg) 100% 100%; background-attachment: fixed; background-size: cover ">
<table class="layout">
    <tr>
        <td style="background-color: cornsilk" colspan="2" class="header">
            <a style="color: black;" href="/">Мой блог</a>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="">

            <div style=";position:relative; text-align: right;" ;><?php if (!empty($user)): ?>

                <div style=""><?php if (empty($check)): ?>
                    <a href="/user/<?= $user->getId() ?>/account">Привет, <?= $user->getNickname() ?>
                        <?php else: ?>
                            Аккаунт- <?= $user->getNickname() ?>
                        <?php endif; ?>| <a href="/users/logout"> Выйти </a></a>
                    <?php else: ?>
                        <a href="/users/login"> Войти </a> | <a href="/users/register"> Зарегестрироваться </a>
                    <?php endif; ?> </div>
            </div>
            <div style=""><a href="/articles/add"> Создать статью</a>
            </div>
        </td>
    </tr>
    <tr>
        <td>