<?php

$data = json_decode(file_get_contents("php://input"), true);

$file = "posts.json";

$posts = json_decode(file_get_contents($file), true);

$posts[$data["index"]]["comments"][] = [
"user" => $data["user"],
"text" => $data["text"],
"time" => $data["time"]
];

file_put_contents($file, json_encode($posts, JSON_PRETTY_PRINT));

echo "ok";

?>