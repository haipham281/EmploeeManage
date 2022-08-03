<?php
require('connectdb.php');
$id=$_REQUEST['id'];
echo "S.No: "./*$_SESSION['ID'];*/$id;
$query = "SELECT * from rest where id='".$id."'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Rest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
</head>
<body>
<center>
    <div class="form">
        <?php
        function approve($id){
            $select_3 = "";
            $select_4 = "";
            
            if ($id == '1') {
                $select_3 = 'selected = "selected"';
            }
            if ($id == '2') {
                $select_4 = 'selected = "selected"';
            }
            
            $select = '<select class="form-control" id="status" name="status">
                    <option value="1" '.$select_3.'>Agree</option>
                    <option value="2" '.$select_4.'>Disagree</option>
                   
                </select>';

            return $select;
        }
        
        if(isset($_POST['new']) && $_POST['new']==1)
        {
            //Id Name Hobbies Address Country
            $id=$_REQUEST['id'];
            $fullname = $_REQUEST['fullname'];
            $status = $_REQUEST['status'];
            $update="update rest set fullname='".$fullname."',status='".$status."' where id='".$id."'";
            $result=mysqli_query($conn, $update);// or die(mysqli_error());]
            header("Location: rest_manage.php");
        }else {
        ?>
        <div>
            <form name="form" method="post" action="" >
                <center>
                    <table style="border: 1px solid black; width:500px; height:300px" cellspacing=10 border=0>
                        <tr>
                            <td colspan="2" ><h2 style="text-align: center;">Update Rest</h2></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="hidden" name="new" value="1" />
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Full Name:</td>
                            <td><input type="text" name="fullname" placeholder="Enter Full Name" required value="<?php echo $row['fullname'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Approve:</td>
                            <td><?php echo approve($row['status']);?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><center><input class="btn btn-primary" name="submit" type="submit" value="Update" /></center></td>
                        </tr>
                    </table>
                </center>
            </form>
        </div>
    </div>
    <a href='rest_manage.php' class="btn btn-dark">Turn Back!</a>
</center>
</body>
<?php }?>
</html>