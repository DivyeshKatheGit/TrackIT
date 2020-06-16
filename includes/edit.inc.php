<?php

    session_start();
    require "dbh.inc.php";
    $uid = $_SESSION['id'];
    $uname = $_SESSION['user'];
    echo "<br>".$uid."<br>".$uname."<br>";
    $table = "abc";
    $flag = "1"; 
    if(isset($_POST['b1-right']))
    {
        $table = "sub1";
    }
    elseif(isset($_POST['b1-wrong']))
    {
        $table = "sub1";
        $flag = "0";
    }
    elseif(isset($_POST['b2-right']))
    {
        $table = "sub2";
    }
    elseif(isset($_POST['b2-wrong']))
    {
        $table = "sub2";
        $flag = "0";
    }
    elseif(isset($_POST['b3-right']))
    {
        $table = "sub3";
    }
    elseif(isset($_POST['b3-wrong']))
    {
        $table = "sub3";
        $flag = "0";
    }
    elseif(isset($_POST['b4-right']))
    {
        $table = "sub4";
    }
    elseif(isset($_POST['b4-wrong']))
    {
        $table = "sub4";
        $flag = "0";
    }
    elseif(isset($_POST['b5-right']))
    {
        $table = "sub5";
    }
    elseif(isset($_POST['b5-wrong']))
    {
        $table = "sub5";
        $flag = "0";
    }
    elseif(isset($_POST['b6-right']))
    {
        $table = "sub6";
    }
    elseif(isset($_POST['b6-wrong']))
    {
        $table = "sub6";
        $flag = "0";
    }
    elseif(isset($_POST['b7-right']))
    {
        $table = "sub7";
    }
    elseif(isset($_POST['b7-wrong']))
    {
        $table = "sub7";
        $flag = "0";
    }
    elseif(isset($_POST['b8-right']))
    {
        $table = "sub8";
    }
    elseif(isset($_POST['b8-wrong']))
    {
        $table = "sub8";
        $flag = "0";
    }
    elseif(isset($_POST['b9-right']))
    {
        $table = "sub9";
    }
    elseif(isset($_POST['b9-wrong']))
    {
        $table = "sub9";
        $flag = "0";
    }
    elseif(isset($_POST['b10-right']))
    {
        $table = "sub10";
    }
    elseif(isset($_POST['b10-wrong']))
    {
        $table = "sub10";
        $flag = "0";
    }
    $sqlsh = "SELECT * FROM $table where uid=$uid";
    $result = mysqli_query($con,$sqlsh);
    $row = mysqli_fetch_assoc($result);
    $history = $row['history'];
    echo "Previous ".$history."<br>";
    if($history==-1)
    {
        $history = $flag;
    }
    else {
        $history=$history.$flag;
    }
    echo "Current ".$history."<br>";
    if($flag=="1")
    {
        $sql = "UPDATE $table SET total=total+1,attended=attended+1,history=$history where uid=$uid";
    }
    elseif ($flag=="0") {
        $sql = "UPDATE $table SET total=total+1,history=$history where uid=$uid";
    }
    else {
        
    }
    mysqli_query($con,$sql);
    header("Location:../dashboard.php?edit=success");
    exit();
?>