<?php

require __DIR__ . '/auth.php';
$login = getUserLogin();


if ($login !== null && !empty($_FILES ['attachment'])) {
    $file = $_FILES ['attachment'];
    $fileName = $file ['name'];
    $newFilePath = __DIR__ . '/uploads/' . $fileName;

    if (file_exists($newFilePath)) {
        $error = 'такой файл существует';
    } elseif ($file['error'] === UPLOAD_ERR_INI_SIZE) {
        $error = 'Размер принятого файла превысил максимально допустимый разме';
    } elseif ($file['error'] === UPLOAD_ERR_FORM_SIZE) {
        $error = 'Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме.';
    } elseif ($file['error'] === UPLOAD_ERR_PARTIAL) {
        $error = 'Загружаемый файл был получен только частично.';
    } elseif ($file['error'] === UPLOAD_ERR_NO_FILE) {
        $error = 'Файл не был загружен.';
    } elseif ($file['error'] === UPLOAD_ERR_NO_TMP_DIR) {
        $error = 'Отсутствует временная папка. Добавлено в PHP 5.0.3.';
    } elseif ($file['error'] === UPLOAD_ERR_CANT_WRITE) {
        $error = 'Не удалось записать файл на диск. Добавлено в PHP 5.1.0.';
    } elseif ($file['error'] === UPLOAD_ERR_EXTENSION) {
        $error = ' PHP-расширение остановило загрузку файла. ';
    } elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
        $error = 'ошибка загрузки файла';
    } else {
        $result = 'файл загружен';
    }

}
?>

<html>
<head>
    <title>
        Загрузка фалов
    </title>
</head>
<body>
<?php if ($login === null): ?>
    <a href="/MyHomeLessons/Other/урок%2095/login.phpк%2095/login.php">Авторизуйтесь</a>
<?php else: ?>
    Добро пожаловать, <?= $login ?> |
    <a href="/MyHomeLessons/Other/урок%2095/logout.php%2095/logout.php">Выйти</a>
    <br>
    <?php if (!empty($error)): ?>
        <?= $error ?>
    <?php elseif (!empty($result)): ?>
        <?= $result ?>
    <?php endif; ?>
    <br>
    <form action="/MyHomeLessons/Otherры/Other/урок%2095/upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="attachment">
        <input type="submit">
    </form>
<?php endif; ?>
</body>
</html>