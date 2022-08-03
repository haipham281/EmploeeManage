<?php
require('connectdb.php');
session_start();
$id=$_REQUEST['id'];

$query1 = "DELETE FROM department WHERE id=$id";
$result1 = mysqli_query($conn,$query1) or die ( mysqli_error());


header("Location: department_manage.php");
?>