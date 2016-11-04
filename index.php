<?php

require_once 'abstract-file-uploader.php';
require_once 'class-single-file-uploader.php';
require_once 'class-multiple-file-uploader.php';

?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>PHP File Uploader</title>
</head>
<body>
    <?php
        if ( 'POST' === $_SERVER['REQUEST_METHOD'] && false === empty( $_FILES['file'] ) ) {

            $uploader = new Single_File_Uploader( $_FILES['file'] );
            $message  = $uploader->upload();
            echo '<p><b>' . $message . '</b></p>';

        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Selecionar arquivo</label> <br><br>
        <input id="file" name="file" type="file"> <br><br>
        <button type="submit" name="upload">Enviar</button>
    </form>
</body>
</html>
