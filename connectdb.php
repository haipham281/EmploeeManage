<?php
$conn = mysqli_connect('localhost', 'root', '', 'database');

if(mysqli_connect_errno()){
    die('can not connect database: ' . $mysqli_connect_errno($conn));
}
?>

