<?php
require "connectdb.php";
session_start();

    if(!isset($_SESSION['id'])){
        header("Location:index_logout.php");
    }

    if($_SESSION['activated']==0){
        $error='Please change your password';
    }

    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);

        if(empty($op)){
            $error='Old Password us required';
        }else if(empty($np)){
            $error='New Password us required';
        }
        else if($np !== $c_np){
            $error='The confirmation password does not match';
        }
        else{
            $op = sha1($op);
            $np = sha1($np);
            $id = $_SESSION['id'];

            $sql = "SELECT password FROM users WHERE id=$id AND password = '$op'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) === 1){
                $sql_2 = "UPDATE users SET password='$np', activated='1' WHERE id='$id'";
                $result_2 = mysqli_query($conn,$sql_2);
                $_SESSION['activated']=1;
                $success="Your password has been changed successfully";
                $error="";
            }else{
                $error="Incorrect password";
            }
        }    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <div id="fb-root"></div>
    <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"></script>
    <title>Change password</title>
    <link rel="stylesheet" href="./css/infomation.css">
    <link rel="stylesheet" href="./css/user.css">
</head>
<center>
    <form style="border: 1px solid black; width:400px; margin-top:100px" class="modal-body" method="POST" action="change_password.php">
        <h2>Change Password</h2>
        <?php if (isset($error)) {?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <?php if (isset($success)) {?>
            <p class="success"><?php echo $success; ?></p>
        <?php } ?>
        <div class="form-group">
            <label for="my-input">Old password</label>
            <input class="form-control mt-2" type="password" name="op" required>
        </div>
        <div class="form-group">
            <label for="my-input">New password</label>
            <input id="newpass" class="form-control mt-2" type="password" name="np" required>
        </div>
        <div class="form-group">
            <label for="my-input">Enter new password again</label>
            <input id="changepass" class="form-control mt-2" type="password" name="c_np" required>
        </div>
        <div>
            <a class="btn btn-dark" href="index.php">Turn Back!</a>
            <button class="btn btn-primary" type="submit">Change</button>
        </div>
        
    </form>
</center>
</html>

