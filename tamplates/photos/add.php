<?php require __DIR__ . '/../header.php' ?>
<?php if ($user->getAvatar() === '/src/img/without.jpg'): ?>
    <div><img src="/src/img/without.jpg" alt="Нет аватара" width="100" height="100"></div>
    <?php if (!empty($error)): ?>
        <div style="background-color: maroon"><?= $error ?></div>
    <?php endif; ?>
    <p>Загрузите свою фотографию</p>
    <div style="background-color: gainsboro;">
        <form action="/photos/add" method="post" enctype="multipart/form-data">
            <label for="photo"><input type="file" name="attachment"></label>
            <input type="submit" value="Загрузить">
        </form>
    </div>
    <br>
    <hr style="width: 50%">
<?php else: ?>
    <div><img src="<?= $user->getAvatar() ?>" alt="<?= $user->getAvatar() ?>" width="100" height="100"></div>
    <br><br>
<?php endif; ?>

<?php require __DIR__ . '/../footer.php' ?>