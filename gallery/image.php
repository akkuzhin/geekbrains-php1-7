<?php
require __DIR__ . '/functions.php';
require_once __DIR__ . '/connect.php';

if(isset($_POST['name']) && !empty($_POST['name'])) {
    $name = $_POST['name'];
}



if (!empty($_FILES) && isset($_FILES['file'])) {
        if (UPLOAD_ERR_OK == $_FILES['file']['error']) {
            if ($_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/png') {
                $link = mysqli_connect($localhost, $user, $password, $database);
                //$res = mysqli_select_db($link, 'gallery');
                $name = $_POST['name'];
                $path_file =  $_FILES['file']['name'];
                $query = "INSERT INTO picture (name, path_file) VALUES ('".$name. "','".$path_file."')";
                $res = mysqli_query($link, $query);
                moveDownloadedFile();
                mysqli_close($link);
            } else {
                
                echo 'Пожалуйства, загрузите картинки только в формате JPEG или PNG!';
            }

        } else  {
            echo 'Файл не загружен!';
        }
}
header('Location: /gallery/index.php');
die;