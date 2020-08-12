<?php require __DIR__ . '/../header.php'; ?>
<?php if ($user->getRole() === 'admin'): ?>

    <table style="">
        <tr->
            <td style="width: 50%">
                <h2>Список последних добавленных статей:</h2>
                <?php foreach ($articles as $article): ?>
                    <div style="background-color: gainsboro; ">
                        <a style="text-decoration: none; display: block; color: black"
                           href="/articles/<?= $article->getId() ?>">
                            <div style="padding-left: 5px"> <?= $article->getAuthor()->getNickname() ?></div>
                            <br>
                            <div style="padding-left: 5px">Название статьи:
                                <br>
                                <?= $article->getName() ?></div>
                            <br>
                            <div style="padding-left: 5px"><?= $article->getText() ?></div>
                            <br>
                            <div style="padding-left: 5px">Дата создания: <?= $article->getCreatedAt() ?></div>
                            <br>
                            <div class="hover" style="padding-left: 5px"><a
                                        href="/articles/<?= $article->getId() ?>/edit">Редактировать статью</a></div>
                            <hr>
                        </a>
                    </div>
                <?php endforeach; ?>
            </td>
            <td>
                <h2>Список последних добавленных комментариев:</h2>
                <?php foreach ($comments as $comment): ?>
                    <div style="background-color: gainsboro; ">
                        <a style="text-decoration: none; display: block; color: black"
                           href="/articles/<?= $comment->getArticleId() ?>/comments/<?= $comment->getId() ?>">
                            <div style="padding-left: 5px"><?= $comment->getAuthor()->getNickname() ?></div>
                            <br>
                            <div style="padding-left: 5px"><?= $comment->getText() ?></div>
                            <br>
                            <div style="padding-left: 5px">Дата создания: <?= $comment->getCreatedAt() ?></div>
                            <br>
                            <div class="hover" style="padding-left: 5px"><a
                                        href="/articles/<?= $comment->getArticleId() ?>/comments/<?= $comment->getId() ?>/edit">Редактировать
                                    комментарий</a></div>
                            <hr>
                        </a>
                    </div>
                <?php endforeach; ?>
            </td>
        </tr->


    </table>

<?php endif; ?>
<?php require __DIR__ . '/../footer.php'; ?>