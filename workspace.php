<?php
    require "connectdb.php"; 
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location:index.php");
    }

    if($_SESSION['activated']==0){
        header('Location: change_password.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"></script>
    <title>Information</title>
    <link rel="stylesheet" href="./css/infomation.css">
    <link rel="stylesheet" href="./css/user.css">
    
</head>
<body>
<header>
    <div class="container-fluid header">
        <div class="container-fluid fixed-top bg-light">

            <nav class=" navbar  navbar-expand-lg">
                <a href="workspace.php" class="navbar-brand col-2">
                    <div class="logo">
                        <img src="./upload/logo.png" alt="">
                    </div>
                </a>
                <div id="my-nav" class="collapse navbar-collapse col-9">
                    <h1 class="col-8">Employee Information System</h1>
                    
                    <div class="mr-3 logout col-6">
                        <a href="assignment_employee.php">Assignment</a>
                        <a href="rest_employee.php" style="margin-left: 20px;">Rest</a>
                        <a href="#" style="margin-left: 20px;">Information</a>
                        <a style="margin-left: 20px;" href="index_logout.php">Logout</a>
                    </div>
                </div>
            </nav>
        </div>

    </div>
</header>


<center>
    <div class="container-fluid banner">
        <div class="container">

            <div class="row">
                <div class="col-3 text-center bg-light">
                    <div class="text-danger ">
                        ACCOUNT
                    </div>
                    <div>
                        <img class="mt-3" src="./<?php echo $_SESSION['image']; ?>" alt="" style="width: 100px;">
                    </div>
                    <div class="col-12 form-group">
                        <strong class="username_display"><?php echo $_SESSION['fullname']; ?></strong>
                    </div>
                    <div style="margin-top: 5px;">
                        <a class="btn btn-primary" href="upload1.php">Change Picture</a> 
                    </div>
                    <div style="margin-top: 5px;">
                        <a class="btn btn-primary" href="change_password.php">Change Password</a> 
                    </div>
                    <div>
                        <a class="btn" href="index_logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                    
                   
                </div>
                <div class="clearfix"></div>
                <div style="border: 1px solid grey;" class="col-9">
                    <h1 style="color: black;">Account Information</h1>
                    <div class="mt-5">
                        <div class="form-row">
                            <div class="col-6 form-group">
                                <label for="">Username:</label>
                                <strong class="username_display"><?php echo $_SESSION['username'];  ?></strong>
                            </div>
                            <div class="col-6 form-group">
                                <label class="" for="">Full Name:</label>
                                <strong class="username_display"><?php echo $_SESSION['fullname']; ?></strong>
                            </div>
                            <div class="col-6 form-group">
                                <label for="">Birth: </label>
                                <strong class="username_display"><?php echo $_SESSION['birth']; ?></strong>
                            </div>
                            <div class="col-6 form-group">
                                <label for="">Phone Number: </label>
                                <strong class="username_display"><?php echo $_SESSION['phone']; ?></strong>
                            </div>
                            <div class="col-6 form-group">
                                <label for="">Email:</label>
                                <strong class="username_display"><?php echo $_SESSION['email']; ?></strong>
                            </div>  
                            <div class="col-6 form-group">
                                <label for="">Department Name:</label>
                                <strong class="username_display"><?php echo $_SESSION['department_name']; ?></strong>
                            </div>          
                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</center>

   



</body>
</html>