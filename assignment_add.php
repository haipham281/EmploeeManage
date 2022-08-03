<?php
    require_once("connectdb.php");
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location:index.php");
    }
    
    if (isset($_POST["SUBMIT"])) {
        $employee_id= $_POST["employee"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $deadline = $_POST["deadline"];

            $sql = "insert into assignment(employee_id, name, description, deadline) VALUES ('$employee_id', '$name', '$description', '$deadline')";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn,$sql);
            header("Location:assignment_manager.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <title>Add Assignment</title>
  
  <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="css/style.css"> 
  <link href="../css/styles-user.css" rel="stylesheet" />
  <link href="../css/style-user.css" rel="stylesheet" />
</head>

<body class="body_edit">
    <form class="form-edit" method="post">
        <h1>Add assignment</h1>
        <hr>
        <?php
            $department=$_SESSION['department_name'];
            $sel_query="SELECT id, fullname from users where permission='user' AND department_name='$department'";
            $result = mysqli_query($conn,$sel_query);
            $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
        ?>
        <select class="form-control mb-1" id="employee" name="employee">
            <option selected>Select employee</option>
            <?php
                foreach($rows as $row ) { 
            ?>
                <option value=<?=$row['id']?>><?= $row['fullname']?></option>
            <?php } ?>
        </select>
        <input type="text" class="form-control mb-1" id="name" placeholder="Enter assignment name" name="name" required>
        <textarea class="form-control mb-1" rows="3" id="description" placeholder="Enter description" name="description" required></textarea>
        <input type="date" class="form-control" id="deadline" placeholder="Select deadline" name="deadline" required>
        <hr>
        <button type="submit" name="SUBMIT" value="Submit" class = "btn btn-dark">Add</button>
        <button type="reset" class="btn btn-dark">Reset</button>
        <a href='assignment_manager.php' class="btn btn-dark">Turn Back!</a>
        <P></P>
    </form>
</body>
</html>