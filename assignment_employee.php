<?php
    require "connectdb.php";
    session_start();

    // if not logged in -> login page
    if(!isset($_SESSION['id'])){
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html>

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
    <title>Assignment</title>
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
                    <h1 class="col-8">Employee Assignment System</h1>
                    
                    <div class="mr-3 logout col-6">
                        <a href="assignment_employee.php">Assignment</a>
                        <a href="rest_employee.php" style="margin-left: 20px;">Rest</a>
                        <a href="workspace.php" style="margin-left: 20px;">Information</a>
                        <a style="margin-left: 20px;" href="index_logout.php">Logout</a>                    
                    </div>
                </div>
            </nav>
        </div>

    </div>
    </header>

    <div style="margin-left: 30px; margin-right: 30px;">
        <table class="table " style="margin-top: 18px;">
            <thead class="thead-light text-center">
                <tr>
                    <th></th>
                    <th>Assignment</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id=$_SESSION['id'];
                $sel_query="SELECT assignment.id, assignment.name, assignment.description, assignment.status, assignment.deadline from assignment, users where assignment.employee_id=users.id AND users.id='$id'";
                $result = mysqli_query($conn,$sel_query);
                $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
                foreach($rows as $row ) { 
                ?>
                    <tr>
                        <td align="center">
                            <form action="assignment.php" method="post">
                                <button name="id" value="<?=$row['id'] ?>" class = "btn btn-dark">Details</button>
                            </form>
                        </td>
                        <td align="center"><?=$row['name'] ?></td>
                        <td align="center"><?=$row['description'] ?></td>
                        <td align="center"><?=$row['deadline'] ?></td>
                        <td align="center"><?=$row['status'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
    
        </table>
    </div>


</body>



<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<!-- <script src="assets/demo/datatables-demo.js"></script> -->

</html>