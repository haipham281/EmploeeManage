<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <title>Add Department</title>
  <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
  <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon"> <!----favicon chua chen-->
  <link rel="stylesheet" href="css/style.css"> 
</head>

<body class="body_edit">
    <form class="form-edit" method="post">
        <h1>Add Department</h1>
        <hr>
        <input type="text" class="form-control" id="department_number" placeholder="Enter department number" name="department_number"  required>
        <input type="text" class="form-control" id="department_name" placeholder="Enter department name" name="department_name" required>
        <input type="text" class="form-control" id="department_head" placeholder="Enter department head" name="department_head" required>
        <input type="text" class="form-control" id="employee" placeholder="Enter employee" name="employee" required>
        <input type="text" class="form-control" id="description" placeholder="Enter description" name="description"  required>
        <hr>
        <button type="submit" name="SUBMIT" value="Submit" class = "btn btn-dark">Add</button>
        <button type="reset" class="btn btn-dark">Reset</button>
        <a href='department_manage.php' class="btn btn-dark">Turn Back!</a>
        <P></P>
    </form>

    
    <?php
    require_once("connectdb.php");

    if (isset($_POST["SUBMIT"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $department_number = $_POST["department_number"];
        $department_name = $_POST["department_name"];
        $department_head = $_POST["department_head"];
        $employee = $_POST["employee"];
        $description = $_POST["description"];
        
        $sql = "insert into department(
          department_number,
          department_name,
          department_head,
          employee,
          description
        ) VALUES (
          '$department_number',
          '$department_name',
          '$department_head',
          '$employee',
          '$description'
        )";
        $result = mysqli_query($conn, $sql);
        
            header("Location:department_manage.php");
        }
      
    
    ?>
</body>
</html>