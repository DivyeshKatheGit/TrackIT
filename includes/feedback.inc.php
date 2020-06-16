<?php

    session_start();
    require "dbh.inc.php";
    $uid =  $_SESSION['id'];
    echo $uid;

    $name = $_POST['username'];
    $message = $_POST['feedback-text'];

    if(isset($_POST['submit']))
    {
        if(empty($_POST['username']) || $_POST['message-text'])
        {
            header("Location:../feedback.php?error='emptyfields'");
            exit();
        }
        else {
            $sql = "INSERT INTO userfeedback(uid,uname,message) VALUES('$uid','$name','$message')";
            mysqli_query($con,$sql);
            header("Location:../feedback.php?insert='success'");
            exit();
        }
    }

?>