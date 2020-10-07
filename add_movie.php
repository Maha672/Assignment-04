<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Assignment-04</title>
</head>
<?php
    require_once "database/connection.php";
?>
<body>
    <div class="container-fluid">
    <h1 class="text-center pt-3">Movies Form</h1>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form action="add_movie_script.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="mtitle">Movie Title:</label>
                    <input type="text" class="form-control" name="mtitle">
                </div>
                <div class="form-group">
                    <label for="mrating">Movie Rating:</label>
                    <input type="number" class="form-control" name="mrating">
                </div>
                <div class="form-group">
                    <label for="rdate">Realese Date:</label>
                    <input type="date" class="form-control" name="rdate">
                </div>
                <div class="form-group">
                    <label for="image">Movie Image:</label>
                    <input type="file" class="form-control-file" name="uploadFile" id="uploadFile" accept="image/*">
                </div>
                <input type="submit" class="btn btn-success mb-5" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>