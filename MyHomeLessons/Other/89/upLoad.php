<?php


if (!empty($_FILES['attachment'])) {
    $file = $_FILES['attachment'];
    $srcFileName = $file ['name'];
    $filePath = $file['tmp_name'];
    $newFilePath = __DIR__ . '/uploads/' . $srcFileName;
    $imgSize = getimagesize($filePath);

    $allowedExtensions = ['jpg', 'png', 'gif'];
    $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);

    if (!in_array($extension, $allowedExtensions)) {
        $error = 'Загрузка файлов с таким расширением запрещена!';
    } elseif ($imgSize[0] > 1280 && $imgSize [1] > 720) {
        $error = 'картинка не должна привышать размеры 1280х720';
    } elseif ($file['size'] > 10485700) {
        $error = 'UPLOAD_ERR_INI_SIZE';
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
    } elseif (file_exists($newFilePath)) {
        $error = 'такой файл уже существует';
    } elseif
    } else {
    $result = 'http://myproject.loc/uploads/' . $srcFileName;
}
}
?>

<html>
<head>
    <title>Страница для загрузки файлов в систему</title>
</head>
<body>
<?php if (!empty($error)): ?>
<?= $error ?>
<?php elseif (!empty ($result)): ?>
<?= $result ?>
<?php endif; ?>
<br>
<form action="/MyHomeLessons/Otherры/Other/урок%2089/upLoad.php" method="post" enctype="multipart/form-data">
    <input type="file" name="attachment">
    <input type="submit">
</form>
</body>
</html>