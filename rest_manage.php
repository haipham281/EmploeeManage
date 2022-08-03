<?php
    require "connectdb.php";
    session_start();

    // If not manager -> logout
    if($_SESSION['permission']!="manager"){
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
    <title>Rest Manager</title>
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
                    <h1 class="col-8">Rest Manager</h1>
                </div>
            </nav>
        </div>

    </div>
    </header>

    <div style="margin-left: 30px; margin-right: 30px;">
        <div>
            <a href='workspace_manager.php' class="btn btn-dark">Turn Back!</a>
        </div>

        <table class="table " style="margin-top: 18px;">
            <thead class="thead-light text-center">
                <tr>
                    <th>#</th>
					<th>Leave Info</th>
					<th>Status</th>
					<th>Reason</th>
					<th>Action By</th>
					<th>Action Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
						<?php 
						$i = 1;
						$types = ("SELECT * FROM rest");
                        $result = mysqli_query($conn, $types);
						while($row = mysqli_fetch_assoc($result)){
							$lt[$row['id']] = ucwords($row['fullname']);
						}
					

						$qry = ("SELECT ll.*,concat(e.fullname) as name, e.id FROM rest ll inner join users on users.id = ll.id  ");
                        $result = mysqli_query($conn, $types);
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
								<p><small>From: <b><?php echo date("M d,Y",strtotime($row['start'])) ?></b></small></p>
								<p><small>To: <b><?php echo date("M d,Y",strtotime($row['end'])) ?></b></small></p>
                                <p><small>Days: <b><?php echo $days ?></b></small></p>
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
							<td>
								<?php echo $row['reason'] ?>
							</td>
							<td>
								<?php echo $action_by ?>
							</td>
							<td><?php echo $row['status'] > 0 ? date("M d,Y",strtotime($row['date_approved'])) : 'N/A' ?></td>
							<td class="text-center">
								<a class="btn btn-primary" href="rest_edit.php?id=<?php echo $row["id"];  ?>">Edit Rest</a>
								<a class="btn btn-dark" href="rest_delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?')">Delete Rest</a>
							</td>
						</tr>
					<?php endwhile;?>
					</tbody>
        </table>
    </div>

</body>



<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<!-- <script src="assets/demo/datatables-demo.js"></script> -->

</html>