<?php include __DIR__ . '/../header.php'; ?>
<div style="text-align: right; margin-right: 20%">
    <h2> Авторизация</h2>
    <?php if (!empty($error)): ?>
        <div style="background-color: maroon"> <?= $error; ?> </div>
    <?php endif; ?>
    <br>

    <form action="/users/login" method="post"
    ">
    <label>Email <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>"></label>
    <br><br>
    <label>Пароль <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"></label>
    <br><br>
    <input type="submit" value="Войти">
    </form>

</div>
<?php include __DIR__ . '/../footer.php'; ?>
