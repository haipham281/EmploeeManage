<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
  <title>Login Account</title>
  
  <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon"> <!----favicon chua chen-->
  <link rel="stylesheet" href="css/user.css"> 
</head>

<body class="body_edit" background="./upload/back.jpeg">
    <form class="form-edit" action="" method="post">
        <div class="container-fluid">
            <div style="background-color: white;" style="width:450px;" class="container sign-up banner">
                <div class="form-row text-center"> 
                    <div class="col-12 sign">
                        <p>LOGIN</p>
                    </div>
                    <div class=" mt-4 form-group col-12">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
                        <input style="margin-top: 10px;" type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <button style="margin-top: 15px;" type="submit" name="btn_submit" class = "btn btn-primary">Login</button>
                        <a class="mt-3 d-block btn-dark" href="#">Forgot password !!!</a>
                    </div>
                </div>    
            </div>
        </div>  

      
    </form>

    
<?php
    require_once("connectdb.php");
    session_start();

    if (isset($_POST["btn_submit"])) {
        $username = $_POST["username"];
        $password = sha1($_POST["password"]);
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
        if ($username == "" || $password =="") {
            echo "username hoặc password bạn không được để trống!";
        }else{
            $sql = "select * from users where username = '$username' and password = '$password' ";
            $query = mysqli_query($conn,$sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows==0) {
              $message = "password or username not correct";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }else{
                while($data = mysqli_fetch_array($query)){
                    $_SESSION['id'] = $data['id']; // Ông thiếu gán id :)
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['permission'] = $data['permission'];
                    $_SESSION['fullname'] = $data['fullname'];
                    $_SESSION['image'] = $data['image'];
                    $_SESSION['department_name'] = $data['department_name'];
                    $_SESSION['birth'] = $data['birth'];
                    $_SESSION['phone'] = $data['phone'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['activated'] = $data['activated'];

                    if($_SESSION['activated']==0){
                        header('Location: change_password.php');
                    }
                }
            }
        }
    }
    
    if(isset($_SESSION['id'])){
        if($_SESSION['permission'] == 'user'){
            header('Location: workspace.php'); //de tam xiu xem lai
        }
        elseif($_SESSION['permission'] == 'admin'){
            header('Location: workspace_admin.php');  //chua lam
        }
        elseif($_SESSION['permission'] == 'manager'){
            header('Location: workspace_manager.php');
        }
    }
?>
</body>
</html>