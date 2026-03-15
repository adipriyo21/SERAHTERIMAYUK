<?php
$data=json_decode(file_get_contents("php://input"),true);

$file="posts.json";

$posts=json_decode(file_get_contents($file),true);

array_splice($posts,$data["index"],1);

file_put_contents($file,json_encode($posts,JSON_PRETTY_PRINT));

echo "ok";