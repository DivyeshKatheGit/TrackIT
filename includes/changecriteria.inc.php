<?php

    session_start();
    require 'dbh.inc.php';
    $uid = $_SESSION['id'];
    $uname = $_SESSION['user'];
    if(isset($_POST['submit']))
    {
        $value = $_POST['range'];
        echo $value;
        $sqlu = "UPDATE users SET criteria=$value where uid=$uid";
        mysqli_query($con,$sqlu);
        header("Location:../settings.php?edit=success");
        exit();
    }

?>