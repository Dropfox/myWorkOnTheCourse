<?php include __DIR__ . '/../header.php'; ?>
<div style="text-align: right; margin-right: 20%">
    <h2> Добавить статью </h2>
    <?php if (!empty($error)): ?>
        <div style="background-color: maroon; color: white"> <?= $error; ?> </div>
    <?php endif; ?>
    <br>
    <form action="" method="post"
    ">
    <label for="text">Текст комментария </label><br>
    <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea><br>
    <br><br>
    <input type="submit" value="Создать">
    </form>
</div>
<?php include __DIR__ . '/../footer.php'; ?>
