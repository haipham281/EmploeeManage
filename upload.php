<?php
    require "connectdb.php";
    session_start();


    var_dump($_FILES);

    $folder_path = 'upload/';
    $file_path = $folder_path.$_FILES['upload_file']['name'];

    $savedName= $_FILES['upload_file'];
    $file= $_FILES['upload_file'];

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
        $id = $_SESSION['id'];
        $sql_2 = "UPDATE users SET image='$file_path' WHERE id='$id'";
        $result_2 = mysqli_query($conn,$sql_2);
        header('HTTP/1.1 307 Temporary Redirect');
        header('Location: workspace.php');
        die();
    }else
    {
        echo 'Can not save the uploaded file';
        die();
    }

?>