<?php

    session_start();
    require "dbh.inc.php";
    $uid = $_SESSION['id'];
    $uname = $_SESSION['user'];
    echo "<br>".$uid."<br>".$uname."<br>";
    $active = true;
    if(isset($_POST['b1-undo']))
    {
        $table = "sub1";
    }
    elseif(isset($_POST['b2-undo']))
    {
        $table = "sub2";
    }
    elseif(isset($_POST['b3-undo']))
    {
        $table = "sub3";
    }
    elseif(isset($_POST['b4-undo']))
    {
        $table = "sub4";
    }
    elseif(isset($_POST['b5-undo']))
    {
        $table = "sub5";
    }
    elseif(isset($_POST['b6-undo']))
    {
        $table = "sub6";
    }
    elseif(isset($_POST['b7-undo']))
    {
        $table = "sub7";
    }
    elseif(isset($_POST['b8-undo']))
    {
        $table = "sub8";
    }
    elseif(isset($_POST['b9-undo']))
    {
        $table = "sub9";
    }
    elseif(isset($_POST['b10-undo']))
    {
        $table = "sub10";
    }
    else {
        
    }
    echo $table."<br>";
    $sqlsh = "SELECT history,total FROM $table where uid=$uid";
    $result = mysqli_query($con,$sqlsh);
    $row = mysqli_fetch_assoc($result);
    $history = $row['history'];
    $total = $row['total'];
    echo "beforehistory".$history."<br>";
    $revhistory = strrev($history);
    $flag = $revhistory[0];
    $revhistory = substr($revhistory,1);
    $history = strrev($revhistory);
    echo "afterhistory".$history."<br>";
    if($history == "-1")
    {
        
    }
    elseif($total==1)
    {
        $sql = "UPDATE $table SET total=0,attended=0,history=-1 where uid=$uid";
        mysqli_query($con,$sql);
    }
    else 
    {
        if($flag == "0")
        {
            $sql = "UPDATE $table SET total=total-1,history=$history where uid=$uid";
            mysqli_query($con,$sql);
        }
        else {
            $sql = "UPDATE $table SET total=total-1,attended=attended-1,history=$history where uid=$uid";
            mysqli_query($con,$sql);
        }
    }
    header("Location:../dashboard.php?edit=success");
    exit();
?>