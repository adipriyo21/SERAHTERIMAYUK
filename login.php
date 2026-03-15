```php
<?php

$data=json_decode(file_get_contents("php://input"),true);

$user=$data["user"];
$pass=$data["pass"];

$users=json_decode(file_get_contents("users.json"),true);

$valid=false;

foreach($users as $u){

if($u["user"]==$user && $u["pass"]==$pass){

$valid=true;

}

}

if($valid){

echo json_encode(["status"=>"ok"]);

}else{

echo json_encode(["status"=>"fail"]);

}

?>
```
