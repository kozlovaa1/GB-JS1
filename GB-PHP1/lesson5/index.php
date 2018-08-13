<?php
$title = 'minimalistica';
$h1 = 'minimalistica';
$year = date('Y');
//$masFiles = scandir('img');

$link = mysqli_connect("127.0.0.1", "root", "", "php1");
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$result = mysqli_query($link,"SELECT * FROM images WHERE size = 'small'");
$result2 = mysqli_query($link,"SELECT * FROM images WHERE size = 'big'");

$epms = array();
while($row = mysqli_fetch_assoc($result))
    $epms[] = $row;

mysqli_close($link);
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
                <div class="image"><a href="image-id.php<?= $image['link'] ?>" class="galleryItem"><img
                                src="<?= $image['link'] ?>" alt="" title="<?= $image['name']?>"
                                width="100"></a></div>
            <? } ?>
    </div>
</div>
</body>
</html>
