
<?php
    require "connectdb.php";
    session_start();

    // If not manager -> logout
    if($_SESSION['permission']!="admin"){
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
    <title>Account Manager</title>
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
                    <h1 class="col-8">Account Manager</h1>
                </div>
            </nav>
        </div>

    </div>
    </header>

    <div style="margin-left: 30px; margin-right: 30px;">
        <div>
            <a href="account_add.php" class=" btn btn-primary" style="margin-left: 3px;">Add</a>
            <a href='workspace_admin.php' class="btn btn-dark">Turn Back!</a>
        </div>

        <table class="table " style="margin-top: 18px;">
            <thead class="thead-light text-center">
                <tr>
        
                    <th>S.No</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    <th>Image</th>
                    <th>Department Name</th>
                    <th>Birth</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Permission</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $count=1;
            $sel_query="Select * from users ORDER BY id desc;";
            $result = mysqli_query($conn,$sel_query);
            //Id Name Hobbies Address Country
            while($row = mysqli_fetch_array($result)) { ?>
                <tr><td align="center"><?php echo $count; ?></td>
                    <td align="center"><?php echo $row["username"]; ?></td>
                    <td align="center"><input type="password" value="<?php echo $row["password"]; ?>" disabled></td>
                    <td align="center"><?php echo $row["fullname"]; ?></td>
                    <td align="center"><img style="width: 80px;" src="./<?php echo $row["image"]; ?>" alt=""></td>
                    <td align="center"><?php echo $row["department_name"]; ?></td>
                    <td align="center"><?php echo $row["birth"]; ?></td>
                    <td align="center"><?php echo $row["email"]; ?></td>
                    <td align="center"><?php echo $row["phone"]; ?></td>
                    <td align="center"><?php echo $row["permission"]; ?></td>
                    <td align="center">
                        <a class="btn btn-primary" style="text-decoration: none;" href="account_edit.php?id=<?php echo $row["id"];  ?>">Edit Account</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-dark" style="text-decoration: none;" href="account_delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?')">Delete Account</a>
                    </td>
                </tr>
                <?php $_SESSION['ID']=($count++)-1; } ?>
            </tbody>
    
        </table>
    </div>

</body>



<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<!-- <script src="assets/demo/datatables-demo.js"></script> -->

</html>