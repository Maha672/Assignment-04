<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Assignment-04</title>
</head>
<body>
<?php
    require_once "database/connection.php";
    if(isset($_POST["submit"])){
        $errors=[];
        if(empty($_POST["mtitle"])){
            $errors[]="Movie Title must not empty";
        }
        else if(strlen($_POST["mtitle"])> 512){
            $errors[]="Movie title must be of 512 characters.";
        }
        else{
            $mtitle=trim($_POST["mtitle"]);
        }
        if(empty($_POST["mrating"])){
            $errors[]="Movie Rating must not empty.";
        }
       // else if((strlen($_POST["mrating"])>=1 && (strlen($_POST["mrating"])<=5))){
         // $errors[]="Movie Rating must be between 1 to 5.";
        //}
        else if(!(($_POST["mrating"])>=1 && ($_POST["mrating"])<=5)){
            $errors[]="Movie Rating must be between 1 to 5.";
        }
        else{
            $mrating=trim($_POST["mrating"]);
        }
        if(empty($_POST["rdate"])){
            $errors[]="Release date must not be empty.";
        }
        else{
            $rdate=trim($_POST["rdate"]);
        }
        if(isset($_FILES["uploadFile"])){
            $target_directory = "images/";
            $file_tmp_name = $_FILES['uploadFile']['tmp_name'];
            $file_name = $_FILES['uploadFile']['name'];
            $file_size = $_FILES['uploadFile']['size'];
            $file_type = $_FILES['uploadFile']['type'];
            $target_file = $target_directory . $file_name;
            $allowed_types = ['image/jpeg', 'image/pjpeg', 'image/png', 'image/PNG', 'image/JPG','image/jpg'];
            $uploadError = 0;
            //Check if file type is allowed
            if(in_array($file_type, $allowed_types)){
                //Check Size
                if($file_size > 5000000){
                    exit("Too large file size. File size cannot exceed 5MB");
                }
                else{
                    //Check if file already exists
                    if(file_exists($target_file)){
                        $errors[] = "File Already Exists!";
                        $uploadError = 1;
                    }
                    //now move the file to the directory
                    move_uploaded_file($file_tmp_name,$target_file);
                    if($_FILES['uploadFile']['error']>0){
                        $errors[] = "File cannot be uploaded due to error";
                        $uploadError = 1;
                    }
                }
            }
            else{
                exit("<div class = 'alert alert-danger'> Invalid File Type </div>");
            }
        }
        else{
            $error[] = "Please Select an image file";
        }

        if(empty($errors)){
           //insert record in the database
           $dbc= db_connect();
           $sql= "INSERT INTO movies VALUES(NULL,'$mtitle', '$mrating', '$rdate', '$target_file')";
            $result= mysqli_query($dbc,$sql);
            if($result){
                echo "<div class='alert alert-success'> Data Entered Successfully </div>";
            }
            else{
                echo "<div class='alert alert-danger'> Data can not be entered</div>"; 
            }
            db_close($dbc);
        }
    else{
        foreach($errors as $error){
        echo "<div class='alert alert-danger'> {$error} </div>";
        }
    }
    }
    else{
        echo "<div class = 'alert alert-danger'>Form is not submitted!</div>";        
}
?>
</body>
</html>
