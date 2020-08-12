<?php require __DIR__ . '/../header.php' ?>
<?php if ($account->getAvatar() === '/src/img/without.jpg'): ?>
    <div><img src="/src/img/without.jpg" alt="Нет аватара" height="100"></div>
    <?php if ($account->getId() === $user->getId()): ?>
        <p>Загрузите свою фотографию</p>
        <div style="background-color: gainsboro;">
            <form action="/photos/add" method="post" enctype="multipart/form-data">
                <label for="photo"><input type="file" name="attachment"></label>
                <input type="submit" value="Загрузить">
            </form>
        </div>
        <br>
    <?php endif; ?>
    <hr style="width: 50%">
<?php else: ?>
    <div><img src="<?= $account->getAvatar() ?>" alt="<?= $account->getAvatar() ?>" height="100"></div>
    <br><br>
<?php endif; ?>

    Последние написанные статьи:
<?php foreach ($articles as $article): ?>
    <a href="/articles/<?= $article->getId() ?>"><p><?= $article->getName() ?></p></a>
    <hr>
<?php endforeach; ?>
    <br><br><br>
    Последние написанные комментарии:
<?php $i = 0;
foreach ($comments as $comment): ?>
    <?php $i++;
    if ($i <= 3): ?>
        <a href="/articles/<?= $comment->getArticleId() ?>/comments/<?= $comment->getId() ?>">
            <p><?= $comment->getText() ?></p></a>
        <hr>
    <?php endif; ?>
<?php endforeach; ?>
<?php require __DIR__ . '/../footer.php' ?>