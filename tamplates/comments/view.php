<?php include __DIR__ . '/../header.php'; ?>
Комментарий от <?= $comment->getAuthor()->getNickname() ?>:
<br>
<br>
<?= $comment->getText() ?>
<br>
<br>
<?php if (!empty($user)): ?>

    <?php if ($user->getRole() === 'admin' or $comment->getAuthorId() == $user->getId()): ?>
        <div class="hover">
            <a style="color: black; text-decoration: none"
               href="/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>/delete"> Удалить
                комментарий </a>
        </div>

        <div class="hover">
            <a href="/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>/edit">Редактировать
                комментарий</a>
        </div>
    <?php endif; ?>

<?php endif; ?>
<?php if (!empty($test)): ?>
    <div style="background-color: chartreuse">Успешно обновлен</div>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>

