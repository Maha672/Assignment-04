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
<div class="container">
<h1 class="text-center text-danger">Movies card</h1>
<div class="row justify-content-center">
            <?php 
                $dbc = db_connect();
                $sql = "SELECT * FROM movies";
                $result = mysqli_query($dbc, $sql);
                while($row = mysqli_fetch_array($result)){ ?>
                    <div class="col-sm-4 mt-2">
                        
                        <div class="card">
                        <img src="<?php echo $row['4']?>" alt="" style="height:50vh;">
                            <div class="card-header">
                                <h2 class="header-text"><?php echo $row['movie_title'];?></h2>
                            </div>
                            <div class="card-body">
                                <p>Movie Rating: <?php echo $row['movie_rating']; ?> </p>
                                <p>Release Date: <?php echo $row['release_date']; ?> </p>
                                <p>Movie Image: <?php echo $row['movie_img']; ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-warning">Update</a>
                                <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                            </div>
                            
                           
                        </div>
                    </div>
                <?php } ?>
        </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>