<?php
$data = [["city" => "Анадырь"], ["city" => "Рязань"], ["city" => "Южно-Сахалинск"]];
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
echo json_encode($data);
?>
