<?php
    require "connectdb.php";
    session_start();

    // If not manager -> logout
    if($_SESSION['permission']!="manager"){
        header("Location:index_logout.php");
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
    <title>Assignment Manager</title>
    <link rel="stylesheet" href="./css/infomation.css">
    <link rel="stylesheet" href="./css/user.css"> 
</head>

<body>
    <header>
    <div class="container-fluid header">
        <div class="container-fluid fixed-top bg-light">

            <nav class=" navbar  navbar-expand-lg">
                <a href="#" class="navbar-brand col-3">
                    <div class="logo">
                        <img src="./upload/logo.png" alt="">
                    </div>
                </a>
                <div id="my-nav" class="collapse navbar-collapse col-9">
                    <h1 class="col-8">Assignment Manager</h1>
                </div>
            </nav>
        </div>

    </div>
    </header>

    <div style="margin-left: 30px; margin-right: 30px;">
        <div>
            <a href="assignment_add.php" class=" btn btn-primary" style="margin-left: 3px;">Add</a>
            <a href='workspace_manager.php' class="btn btn-dark">Turn Back!</a>
        </div>

        <table class="table " style="margin-top: 18px;">
            <thead class="thead-light text-center">
                <tr>
                    <th></th>
                    <th>Employee</th>
                    <th>Assignment</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $department=$_SESSION['department_name'];
                $sel_query="SELECT assignment.id, users.fullname, assignment.name, assignment.description, assignment.status, assignment.deadline from assignment, users where assignment.employee_id=users.id AND users.department_name='$department'";
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
                        <td align="center"><?=$row['fullname'] ?></td>
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