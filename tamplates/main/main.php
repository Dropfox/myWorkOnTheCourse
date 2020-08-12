<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article): ?>
    <h2><a href="/articles/<?= $article->getId() ?>"><?= $article->getName() ?></a></h2>
    <p><?= $article->getText() ?></p>

    <div style="display: block">
        <a href="/user/<?= $article->getAuthor()->getId() ?>/account"
           style="position: inherit; text-decoration: none; ">
            <img align="middle" height="100" src="<?= $article->getAuthor()->getAvatar() ?>"
                 alt="<?= $article->getAuthor()->getAvatar() ?>">
            Автор: <?= $article->getAuthor()->getNickname() ?>
        </a>
    </div>


    <div>

        <div style="background-color: grey; margin: 0px -20px 3px -20px">
            <h3 style="text-align: center; color: white; text-shadow: black 0 0 20px ">Комментарии: </h3>

            <?php foreach ($comments as $comment): ?>

                <?php if ($article->getId() == $comment->getArticleId()): ?>
                    <div style="bottom: 15px; padding-bottom: 5px; left:15%;background-color: white; border: 1px solid black; display: block; width: 70%; position: relative; text-align: center">
                        <a style="text-decoration: none;"
                           href="/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>">
                            <p style="color: midnightblue; text-align: left; padding-left: 30px;"><img height="80"
                                                                                                       style="max-width: 100% "
                                                                                                       src="<?= $comment->getAuthor()->getAvatar() ?>"
                                                                                                       alt="<?= $comment->getAuthor()->getAvatar() ?>">
                            </p>
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
                <a href="articles/<?= $article->getId() ?>/comments/add">Написать комментарий</a>
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
    <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>