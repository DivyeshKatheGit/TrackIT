<?php

    session_start();
    require "dbh.inc.php";
    $uid = $_SESSION['id'];
    $uname = $_SESSION['user'];
    $table = $_SESSION['table'];
    echo $uid;
    echo $table;
    $sqlssub = "select * from $table where uid=$uid";
    $result = mysqli_query($con,$sqlssub);
    $row = mysqli_fetch_assoc($result);
    $subname = $row['sname'];
    $total = $row['total'];
    $attended = $row['attended'];

    if(isset($_POST['login-submit']))
    {
        if(!empty($_POST['subject']))
        {
            $subname = $_POST['subject'];
        }
        if(!empty($_POST['attended']))
        {
            $attended = $_POST['attended'];
        }
        if(!empty($_POST['total']))
        {
            $total = $_POST['total'];
        }
        echo $subname;
        echo $total;
        echo $attended;

        $sqlusub = "UPDATE $table SET sname='$subname',total='$total',attended='$attended' where uid=$uid";
        mysqli_query($con,$sqlusub);
        header("Location:../settings.php?edit=success");
        exit();
    }
?>