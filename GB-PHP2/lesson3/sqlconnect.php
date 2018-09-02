<?php
$link = mysqli_connect("127.0.0.1", "root", "", "php1");
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$result = mysqli_query($link,"SELECT * FROM images");

$epms = array();
while($row = mysqli_fetch_assoc($result))
    $epms[] = $row;

mysqli_close($link);