<?php include __DIR__ . '/../header.php'; ?>
    <h2><?= $article->getName() ?></h2>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <div>

        <div style="background-color: grey; margin: 0px -20px 3px -20px">
            <h3 style="text-align: center; color: white; text-shadow: black 0 0 20px ">Комментарии: </h3>

            <?php foreach ($comments as $comment): ?>
                <?php if ($article->getId() == $comment->getArticleId()): ?>
                    <div style="bottom: 15px; padding-bottom: 5px; left:15%;background-color: white; border: 1px solid black; display: block; width: 70%; position: relative; text-align: center">
                        <a style="text-decoration: none;"
                           href="/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>">
                            <p style="color: midnightblue; text-align: left; padding-left: 30px;">
                                Автор: <?= $comment->getAuthor()->getNickname() ?> </p>
                            <p style="text-align: left; padding-left: 15px"><?= $comment->getText() ?></p>
                        </a>

                        <?php if (!empty($user)): ?>
                            <?php if ($user->getRole() === 'admin' or $comment->getAuthorId() == $user->getId()): ?>
                                <div class="hover">
                                    <a style="color: black; text-decoration: none"
                                       href="/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>/delete">
                                        Удалить комментарий </a>
                                </div>

                                <div class="hover">
                                    <a href="/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>/edit">Редактировать
                                        комментарий</a>
                                </div>

                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($user)): ?>
            <div class="hover">
                <a href="/articles/<?= $article->getId() ?>/comments/add">Написать комментарий</a>
            </div>
        <?php endif; ?>

        <br>
        <?php if (!empty($user) and $user->getRole() === 'admin'): ?>

            <div class="hover">
                <a href="/articles/<?= $article->getId() ?>/edit">Редактировать статью</a>
            </div>

            <br>

            <div class="hover">
                <a style="color: maroon; text-align: right" href="/articles/<?= $article->getId() ?>/delete">Удалить
                    статью</a>
            </div>

        <?php endif; ?>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>