<?php
    require "connectdb.php";
    session_start();

    var_dump($_FILES);

    $folder_path = 'Submit/';
    $file_path = $folder_path.$_FILES['submit_file']['name'];

    $savedName= $_FILES['submit_file'];
    $file= $_FILES['submit_file'];

    $name= $file['name'];
    $type= $file['type'];
    $temp_name= $file['tmp_name'];
    $error= $file['error'];
    $size= $file['size'];

    $ext= pathinfo($name, PATHINFO_EXTENSION);

    if($size>5*1024*1024)
    {
        echo 'File is too large';
        die();
    }

    if(move_uploaded_file($temp_name, $file_path))
    {
        echo 'File has been saved';
        $id= $_POST['id'];
        $status=$_POST['status'];
        $sql_2 = "UPDATE assignment SET status='$status', submit_file='$file_path', submit_date=now() WHERE id='$id'";
        $result_2 = mysqli_query($conn,$sql_2);
        header('HTTP/1.1 307 Temporary Redirect');
        header('Location: assignment.php');
        die();
    }else
    {
        echo 'Can not save the uploaded file';
        die();
    }
?>