<?php
$title = 'minimalistica';
$h1 = 'minimalistica';
$year = date('Y');
//$masFiles = scandir('img');

include('sqlconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="stylesheet" href="css/modal.css" type="text/css"/>
    <title><?= $title; ?></title>
</head>
<body>
<div id="content">
    <h1><?= $h1; ?></h1>

    <div class="gallery">
        <? foreach ($epms as $key => $image) { ?>
                <div class="image"><a href="<?= $image['link'] ?>" class="galleryItem"><img
                                src="<?= $image['link'] ?>" alt="" title="<?= $image['name']?>"
                                width="100"></a></div>
            <? } ?>
    </div>
</div>
<script
        src="http://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>
