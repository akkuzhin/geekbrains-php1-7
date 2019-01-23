<?php
        require __DIR__ . '/functions.php';
?><!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$images = getFileList();
foreach ($images as $image) {
    if ('.' == $image || '..' == $image) {
        continue;
    }?>
    <img src="/gallery/images/<?php echo $image; ?>" width = "200" >
    <hr>
    <?php
}
?>
<form action="/gallery/image.php" method="post" enctype="multipart/form-data">
    Название картинки:<br>
    <input type="text" name="name">
    <input type="file" name="file">
    <input type="submit">
</form>
</body>
</html>