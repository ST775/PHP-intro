<?php

$name = $_GET["name"];
$gender = $_GET["gender"];
$blood = $_GET["blood"];

// check

// ng
// 元のページに戻す

// ok
echo $name;
echo $gender;
echo $blood;

setcookie("submitted", 1);

?>