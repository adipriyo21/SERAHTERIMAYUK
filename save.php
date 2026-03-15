<?php
date_default_timezone_set("Asia/Jakarta");
$user = $_POST["user"] ?? "";
$text = $_POST["text"] ?? "";
$time = date("Y-m-d H:i");

$fileName = "";

if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){

$original = $_FILES["file"]["name"];

$clean = preg_replace("/[^a-zA-Z0-9.]/", "_", $original);

$newName = time()."_".$clean;

$target = "uploads/".$newName;

if(move_uploaded_file($_FILES["file"]["tmp_name"], $target)){
$fileName = $target;
}

}

$post = [
"user"=>$user,
"text"=>$text,
"time"=>$time,
"file"=>$fileName,
"comments"=>[]
];

$file = "posts.json";

$posts = json_decode(file_get_contents($file), true);

if(!$posts){
$posts = [];
}
$maxSize = 50 * 1024 * 1024; // 50MB

if($_FILES["file"]["size"] > $maxSize){
exit("File terlalu besar");
}

array_unshift($posts,$post);

file_put_contents($file,json_encode($posts,JSON_PRETTY_PRINT));

echo "ok";

?>