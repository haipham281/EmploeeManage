<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <title>Add Account</title>
  
  <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="css/style.css"> 
  <link href="../css/styles-user.css" rel="stylesheet" />
  <link href="../css/style-user.css" rel="stylesheet" />
</head>

<body class="body_edit">
      <?php
        function make_permission_dropdown($id){
            $select_1 = "";
            $select_2 = "";
            $select_3 = "";

            if ($id == 'user') {
                $select_1 = 'selected = "selected"';
            }
            if ($id == 'admin') {
                $select_2 = 'selected = "selected"';
            }
            if ($id == 'manager'){
                $select_3 = 'selected = "selected"';
            }
            $select = '<select class="form-control" id="permission" name="permission">
                    <option value="user" '.$select_1.'>User</option>
                    <option value="admin" '.$select_2.'>Admin</option>
                    <option value="manager" '.$select_3.'>Manager</option>
                </select>';

            return $select;
        }
      ?>
    <form class="form-edit" method="post">
        <h1>Add User</h1>
        <hr>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"  required>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
        <input type="password" class="form-control" id="password" placeholder="Password again" name="rppassword" required>
        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" required>
        <input type="text" class="form-control" id="image" placeholder="Enter Name Image" name="image" required>
        <input type="text" class="form-control" id="department_name" placeholder="Enter Department Name" name="department_name" required>
        <input type="date" class="form-control" id="birth" placeholder="Select Birth" name="birth" required>
        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required>
        <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone"  required>
        <?php echo make_permission_dropdown($row['permission']);?>
        <hr>
        <button type="submit" name="SUBMIT" value="Submit" class = "btn btn-dark">Add</button>
        <button type="reset" class="btn btn-dark">Reset</button>
        <a href='account_manage.php' class="btn btn-dark">Turn Back!</a>
        <P></P>
    </form>
    <?php
    require_once("connectdb.php");
    
    if (isset($_POST["SUBMIT"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $username = $_POST["username"];
        $password = $_POST["password"];
        $rppassword = $_POST["rppassword"];
        $pass = sha1($password);
        $name = $_POST["name"];
        $image = $_POST["image"];
        $department_name = $_POST["department_name"];
        $birth = $_POST["birth"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $sql = "select * from users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($username == "" || $password == "" || $name == "" || $birth == "" || $email == "" || $phone == "" || $rppassword == "" ) {
            echo "bạn vui lòng nhập đầy đủ thông tin";
        }	
      
      else{
        if(mysqli_num_rows($result) > 0){//chua chinh ngon ngu
                echo "<script>
                    alert('ten dang nhap da bi trung')
                    </script>";    
                }

        else if($password != $rppassword){//chua chinh ngon ngu
          echo "<script>
                    alert('mat khau khong khop')
                    </script>";
      }
      else{
            $sql = "insert into users(
                        username,
                        password,
                        fullname,
                        image,
                        department_name,
                        birth,
                        email,
                        phone
                      ) VALUES (
                        '$username',
                        '$pass',
                        '$name',
                        '$image',
                        '$department_name',
                        '$birth',
                        '$email',
                        '$phone'
                      )";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn,$sql);
            header("Location:account_manage.php");
        }
      }
    }
    ?>
</body>
</html>