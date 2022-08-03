<?php
    require('connectdb.php');

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
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <title>Products</title>
    <link rel="stylesheet" href="./css/user.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-4 card mt-5 p-3">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="custom-file">
                            <input style="cursor: pointer;" name="upload_file" type="file" class="custom-file-input" id="customFile">
                            <label for="customFile" class="custom-file-label">Choose</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>


</html>    