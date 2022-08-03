<?php
    require "connectdb.php";
    session_start();

    if(!isset($_SESSION['id']) ){
        header("Location:index.php");
    }

    if(isset($_POST['id'])){
        $id=$_POST['id'];

        if(isset($_POST['status'])){
            $status=$_POST['status'];
            // if($status=='Waiting'){
            //     $sql_2 = "UPDATE assignment SET status='$status', submit_date=now() WHERE id='$id'";
            // }elseif($status=='Completed'){
            if($status=='Completed'){
                $rating=$_POST['rating'];
                $sql_2 = "UPDATE assignment SET status='$status', rating='$rating' WHERE id='$id'";
            }else{
                $sql_2 = "UPDATE assignment SET status='$status' WHERE id='$id'";
            }
            $result_2 = mysqli_query($conn,$sql_2);
        }

        $sel_query="SELECT name, description, status, deadline, submit_file, submit_date, rating from assignment where id='$id'";
        $result = mysqli_query($conn,$sel_query);
        $row=mysqli_fetch_array($result);
    }else{
        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <div id="fb-root"></div>
    <link rel="icon" href="./upload/logoi.png" type="image/gif" sizes="16x16">
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"></script>
    <title>Assignment</title>
    <link rel="stylesheet" href="./css/infomation.css">
    <link rel="stylesheet" href="./css/user.css">
</head>
<center>
    <div class="container">
        <div class="card" style="margin-top: 100px; margin-bottom: 100px; width:500px;">
            <table>
                <tr>
                    <th class="p-2" style="text-align: center;" colspan="2"><?=$row['name']?></th>
                </tr>
                <tr>
                    <th class="p-2">Description: </th>
                    <td class="p-2"><?=$row['description']?></td>
                </tr>
                <tr>
                    <th class="p-2">Deadline: </th>
                    <td class="p-2"><?=$row['deadline']?></td>
                </tr>
                <tr>
                    <th class="p-2">Status: </th>
                    <td class="p-2"><?=$row['status']?></td>
                </tr>
                <?php
                    if(isset($row['submit_date'])){
                ?>
                    <tr>
                        <th class="p-2">Submit date: </th>
                        <td class="p-2"><?=$row['submit_date']?></td>
                    </tr>
                <?php
                }
                if(isset($row['submit_file'])){
                    $filename=explode('/', $row['submit_file']);
                ?>
                    <tr>
                        <th class="p-2">Submit file: </th>
                        <td class="p-2">
                            <a class="file_link" href="download.php?file=<?=$row['submit_file']?>"><?=end($filename)?></a>
                        </td>
                    </tr>
                <?php
                    }
                    if(isset($row['rating'])){
                ?>
                    <tr>
                        <th class="p-2">Rating: </th>
                        <td class="p-2"><?=$row['rating']?></td>
                    </tr>
                <?php } ?>
            </table>
            <div class="p-2">
                <?php
                    $boolcheck=false;
                    if(($row['status']=='In progress' || $row['status']=='Rejected') && $_SESSION['permission'] == 'user'){
                        $boolcheck=true;
                ?>
                    <form action="assignment_submit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="submit_file" required>
                                <label for="upload_file" class="custom-file-label">Choose</label>
                            </div>
                        </div>
                <?php }else{?>
                    <form action="assignment.php" method="post">
                    <?php
                    }
                        $boolcheck2=false;
                        if($row['status']=='Waiting' && $_SESSION['permission'] == 'manager'){
                            $boolcheck2=true;
                    ?>
                        <div class="form-row mb-3 justify-content-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="bad" value="Bad" required>
                                <label class="form-check-label" for="inlineRadio1">Bad</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="ok" value="OK" required>
                                <label class="form-check-label" for="inlineRadio2">OK</label>
                            </div>
                            <?php
                                if($row['deadline'] > $row['submit_date']){
                            ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rating" id="good" value="Good" required>
                                    <label class="form-check-label" for="inlineRadio3">Good</label>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>

                    <a class="btn btn-dark" href="assignment_manager.php">Turn Back!</a>
                    <input type="hidden" name="id" value=<?=$id?>>

                    <?php 
                        if($row['status']=='New'){
                            if($_SESSION['permission'] == 'user'){
                    ?>
                                <button class="btn btn-primary" name="status" type="submit" value="In progress">Start</button>
                            <?php
                            }elseif($_SESSION['permission'] == 'manager'){
                            ?>
                                <button class="btn btn-danger" name="status" type="submit" value="Canceled">Cancel</button>
                            <?php
                            }
                            ?>
                    <?php
                        }elseif($boolcheck){
                    ?>
                            <button class="btn btn-primary" name="status" type="submit" value="Waiting">Submit</button>
                    <?php 
                        }elseif($boolcheck2){
                    ?>
                            <button class="btn btn-danger" name="status" type="submit" value="Rejected">Reject</button>
                            <button class="btn btn-primary" name="status" type="submit" value="Completed">Complete</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</center>
    <script>
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</html>