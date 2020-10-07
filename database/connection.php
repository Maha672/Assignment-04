<?php
    require_once "credentials.php";
    function db_connect(){
        $dbc= mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB_NAME);
        if(!$dbc){
            echo mysqli_connect_error();
            exit();
        }
        return $dbc;
    }
    function db_close($dbc){
        if(isset($dbc)){
            mysqli_close($dbc);
        }
    }
?>