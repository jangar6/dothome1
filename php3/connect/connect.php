<?php
    $host = "localhost";
    $user = "richclub8";
    $pw = "Forever0!";
    $dbName = "richclub8";
    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect -> set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "database connect false";
    } else {
        //echo "database connect true";
    }
?>