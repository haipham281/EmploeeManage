<?php
require('connectdb.php');
$id=$_REQUEST['id'];
echo "S.No: "./*$_SESSION['ID'];*/$id;
$query = "SELECT * from users where id='".$id."'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<center>
    <div class="form">
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
        if(isset($_POST['new']) && $_POST['new']==1)
        {
            //Id Name Hobbies Address Country
            $id=$_REQUEST['id'];
            $username = $_REQUEST['username'];
            $password =$_REQUEST['password'];
            $pass = sha1($password);
            $fullname =$_REQUEST['fullname'];
            $image =$_REQUEST['image'];
            $department_name =$_REQUEST['department_name'];
            $birth = $_REQUEST['birth'];
            $email = $_REQUEST['email'];
            $phone = $_REQUEST['phone'];
            $permission = $_REQUEST['permission'];
            $update="update users set username='".$username."',password='".$pass."', fullname='".$fullname."', image='".$image."',email='".$email."',birth='".$birth."', permission='".$permission."', phone='".$phone."' where id='".$id."'";
            $result=mysqli_query($conn, $update);// or die(mysqli_error());]
            header("Location: account_manage.php");
        }else {
        ?>
        <div>
            <form name="form" method="post" action="" >
                <center>
                    <table style="border: 1px solid black; width:400px; height:400px" cellspacing=10 border=0>
                        <tr>
                            <td colspan="2" ><h2 style="text-align: center;">Update Account</h2></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="hidden" name="new" value="1" />
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>" /></td>
                        </tr>
                        <tr>
                            <td>User Name:</td>
                            <td><input type="text" name="username" placeholder="Enter User Name" required value="<?php echo $row['username'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" placeholder="Enter Password" required value="<?php echo $row['password'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Full Name:</td>
                            <td><input type="text" name="fullname" placeholder="Enter Name" required value="<?php echo $row['fullname'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Image:</td>
                            <td><input type="text" name="image" placeholder="Enter Image" required value="<?php echo $row['image'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Department Name:</td>
                            <td><input type="text" name="department_name" placeholder="Enter Department Name" required value="<?php echo $row['department_name'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Birth:</td>
                            <td><input type="date" name="birth" placeholder="Enter Birth" required value="<?php echo $row['birth'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" placeholder="Enter Email" required value="<?php echo $row['email'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td><input type="text" name="phone" placeholder="Enter Phone" required value="<?php echo $row['phone'];?>" /></td>
                        </tr>
                        <tr>
                            <td>permission:</td>
                            <td><?php echo make_permission_dropdown($row['permission']);?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><center><input class="btn btn-primary" name="submit" type="submit" value="Update" /></center></td>
                        </tr>
                    </table>
                </center>
            </form>
        </div>
    </div>
    <a href='account_manage.php' class="btn btn-dark">Turn Back!</a>
</center>

</body>
<?php }?>
</html>