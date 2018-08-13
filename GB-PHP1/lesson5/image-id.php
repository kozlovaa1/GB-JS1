<?php
$link = mysqli_connect("127.0.0.1", "root", "", "php1");
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$result = mysqli_query($link,"SELECT * FROM images WHERE size = 'big'");

$epms = array();
while($row = mysqli_fetch_assoc($result))
    $epms[] = $row;

mysqli_close($link);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="queryImageForm">
    <input type="text">
    <input type="submit">
</div>
<div class="image"></div>
</body>
</html>
