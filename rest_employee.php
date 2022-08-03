<?php include 'connectdb.php' ?>
<style>
	td p {
		margin:unset;
	}
</style>

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
    <title>Rest</title>
    <link rel="stylesheet" href="./css/infomation.css">
    <link rel="stylesheet" href="./css/user.css"> 
</head>
<header>
    <div class="container-fluid header">
        <div class="container-fluid fixed-top bg-light">

            <nav class=" navbar  navbar-expand-lg">
                <a href="workspace.php" class="navbar-brand col-2">
                    <div class="logo">
                        <img src="./upload/logo.png" alt="">
                    </div>
                </a>
                <div id="my-nav" class="collapse navbar-collapse col-9">
                    <h1 class="col-8">Employee Rest System</h1>
                    
                    <div class="mr-3 logout col-6">
                        <a href="assignment_employee.php">Assignment</a>
                        <a href="rest_employee.php" style="margin-left: 20px;">Rest</a>
                        <a href="workspace.php" style="margin-left: 20px;">Information</a>
                        <a style="margin-left: 20px;" href="index_logout.php">Logout</a>
                    </div>
                </div>
            </nav>
        </div>

    </div>
</header>
<center>
<div class="container-fluid">
<div>
	<a href="rest_employee_add.php" class=" btn btn-outline-dark" style="background-color: red; margin: 10px;">Offline Application</a>
</div>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">My Leave Application List</div>
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Leave Info</th>
						<th>Status</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					$i = 1;
					$types = ("SELECT * FROM users");
					$result = mysqli_query($conn, $types);
					while($row = mysqli_fetch_assoc($result)){
						$lt[$row['id']] = ucwords($row['username']);
					}

				
					$qry = ("SELECT * FROM rest");
					$result = mysqli_query($conn, $qry);
					while($row = mysqli_fetch_assoc($result)):
						$days = abs(strtotime($row['start'].' +1 day') - strtotime($row['end']));
						$days = floor($days / (60*60*24));
						$action_by = 'N/A';
						if($row['status'] > 0){
							$emp = $conn->query("SELECT *,concat(fullname) as name from rest where id = ".$row['approved_by']);
							if($emp->num_rows > 0 ){
								$action_by = ucwords($emp->fetch_array()['fullname']);
							}
						}
					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td>
							<p>Employee: <b><?php echo ucwords($row['fullname']) ?></b></p>
							<p>From: <b><?php echo date("M d,Y",strtotime($row['start'])) ?></b></small></p>
							<p>To: <b><?php echo date("M d,Y",strtotime($row['end'])) ?></b></small></p>
							<p>Total number of days off: <b><?php echo $days ?></b></small></p>
						</td>
						<td class="text-center">
							<?php if($row['status'] == 0): ?>
								<span class="badge badge-primary">Pending</span>
							<?php elseif($row['status'] == 1): ?>
								<span class="badge badge-success">Approved</span>
							<?php elseif($row['status'] == 2): ?>
								<span class="badge badge-danger">Declined</span>
							<?php endif; ?>
						</td>
					</tr>
				<?php endwhile;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

</center>
</html>