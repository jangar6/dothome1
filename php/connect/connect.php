<?php
    $host = "localhost";
    $user = "jangar6621";
    $pw = "ar69315698!!";
    $dbName = "jangar6621";
    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect -> set_charset("utf-8");

    if(mysqli_connect_errno()){
        echo "database connect false";
    } else {
        // echo "database connect true";
    }
?>