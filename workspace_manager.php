<?php
    require "connectdb.php"; ///description la subject
    session_start();

    if($_SESSION['permission']!="manager"){
        header("Location:index_logout.php");
    }

    if($_SESSION['activated']==0){
        header('Location: change_password.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---import CSS server-->
    <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
    <title>Workspace Manager</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-user.css">
    <link rel="stylesheet" href="css/styles-user.css">


</head>
<body>
    <!---navbar--->
    <nav class="navbar navbar-expand-md sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <!---move to manage account-->
                <img src="./upload/logo.png" height="50"> 
            </a>
            <div class="topnav-right">
                
                <strong class="username_display"><?php echo $_SESSION['fullname']; ?>  </strong>
                
                <a href="index_logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav" class="content">
        <div style="margin-top: 10px;" id="layoutSidenav_nav" >
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <ul>
                            <li>
                                <a class="nav-link" href="assignment_manager.php">
                                    Assignment Manager
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="rest_manage.php">
                                    Rest Manager
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: Admin</div> 
                </div>
            </nav>
        </div>


        <div style="margin-top: 10px;" id="layoutSidenav_content" >
            <div>
                <img style="width: 100%; height:100%;" src="./upload/ban.png" alt="">
            </div>
        </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        
        
    </div> 

    
    <!----JavaScript----->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>