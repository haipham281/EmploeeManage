<?php
require('connectdb.php');
$id=$_REQUEST['id'];
echo "S.No: "./*$_SESSION['ID'];*/$id;
$query = "SELECT * from department where id='".$id."'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Department</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<center>
    <div class="form">
        <?php
        
        if(isset($_POST['new']) && $_POST['new']==1)
        {
            //Id Name Hobbies Address Country
            $id=$_REQUEST['id'];
            $department_number = $_REQUEST['department_number'];
            $department_name =$_REQUEST['department_name'];
            $department_head =$_REQUEST['department_head'];
            $employee =$_REQUEST['employee'];
            $description = $_REQUEST['description'];
            
            $update="update department set department_number='".$department_number."',department_name='".$department_name."',department_head='".$department_head."', employee='".$employee."',description='".$description."' where id='".$id."'";
            $result=mysqli_query($conn, $update);// or die(mysqli_error());]
            header("Location: department_manage.php");
        }else {
        ?>
        <div>
            <form name="form" method="post" action="" >
                <center>
                    <table style="border: 1px solid black; width:400px; height:300px" cellspacing=10 border=0>
                        <tr>
                            <td colspan="2" ><h2 style="text-align: center;">Update Department</h2></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="hidden" name="new" value="1" />
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Department Number:</td>
                            <td><input type="text" name="department_number" placeholder="Enter Department Number" required value="<?php echo $row['department_number'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Department Name:</td>
                            <td><input type="text" name="department_name" placeholder="Enter Department Name" required value="<?php echo $row['department_name'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Department Head:</td>
                            <td><input type="text" name="department_head" placeholder="Enter Department Head" required value="<?php echo $row['department_head'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Employee:</td>
                            <td><input type="text" name="employee" placeholder="Enter Quantity Employee" required value="<?php echo $row['employee'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td><input type="text" name="description" placeholder="Enter Description" required value="<?php echo $row['desciption'];?>" /></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2"><center><input class="btn btn-primary" name="submit" type="submit" value="Update" /></center></td>
                        </tr>
                    </table>
                </center>
            </form>
        </div>
    </div>
    <a href='department_manage.php' class="btn btn-dark">Turn Back!</a>
</center>
</body>
<?php }?>
</html>