<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
  <title>Add Rest</title>
  
  <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon"> <!----favicon chua chen-->
  <link rel="stylesheet" href="css/style.css"> 
</head>

<body class="body_edit">
    <form class="form-edit" method="post">
        <h1>Application for leave of absence</h1>
        <hr>
        <input type="text" style="margin-top: 5px;" class="form-control" id="fullname" placeholder="Enter Full Name" name="fullname"  required>
        <input type="date" style="margin-top: 5px;" class="form-control" id="start" placeholder="Enter Time Start" name="start" required>
        <input type="date" style="margin-top: 5px;" class="form-control" id="end" placeholder="Enter Time End" name="end" required>
        <input type="text" style="margin-top: 5px;" class="form-control" id="reason" placeholder="Enter Reason" name="reason"  required>
        <hr>
        <button type="submit" name="SUBMIT" value="Submit" class = "btn btn-dark">Add</button>
        <a href='rest_employee.php' class="btn btn-dark">Turn Back!</a>
        <P></P>
    </form>

    <?php
    require_once("connectdb.php");
    if (isset($_POST["SUBMIT"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $fullname = $_POST["fullname"];
        $start = $_POST["start"];
        $end = $_POST["end"];
        $reason = $_POST["reason"];


        
        $sql = "insert into rest(
            fullname,
            start,
            end,
            reason
            ) VALUES (
            '$fullname',
            '$start',
            '$end',
            '$reason'
        )";
        $result = mysqli_query($conn, $sql);
            header("Location:rest_employee.php");
        }
    ?>
</body>
</html>

            