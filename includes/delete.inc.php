<?php

    session_start();
    require 'dbh.inc.php';
    $uid = $_SESSION['id'];
    $uname = $_SESSION['user'];
    $subno = "0";
    if(isset($_POST['b1-delete']))
    {
        $subno = "1";
    }
    elseif(isset($_POST['b2-delete']))
    {
        $subno = "2";
    }
    elseif(isset($_POST['b3-delete']))
    {
        $subno = "3";
    }
    elseif(isset($_POST['b4-delete']))
    {
        $subno = "4";
    }
    elseif(isset($_POST['b5-delete']))
    {
        $subno = "5";
    }
    elseif(isset($_POST['b6-delete']))
    {
        $subno = "6";
    }
    elseif(isset($_POST['b7-delete']))
    {
        $subno = "7";
    }
    elseif(isset($_POST['b8-delete']))
    {
        $subno = "8";
    }
    elseif(isset($_POST['b9-delete']))
    {
        $subno = "9";
    }
    elseif(isset($_POST['b10-delete']))
    {
        $subno = "10";
    }
    else {
        
    }

    $sqld = "DELETE FROM sub$subno where uid=$uid";
    mysqli_query($con,$sqld);
    $sqlu = "UPDATE users SET subjects=subjects-1 where uid=$uid";
    mysqli_query($con,$sqlu);
    $sqlssub = "select subjects from users where uid=$uid";
    $result = mysqli_query($con,$sqlssub);
    $row = mysqli_fetch_assoc($result);
    $subjects = $row['subjects'];
    for($i=$subno;$i<=$subjects;$i++)
    {
        echo $i."<br>";
        $next = $i+1;
        echo $next."<br>";
        $sqlsall = "SELECT * FROM sub$next where uid=$uid";
        $results = mysqli_query($con,$sqlsall);
        $rerow = mysqli_fetch_assoc($results);
        $id= $rerow['uid'];
        $name = $rerow['uname'];
        $sub = $rerow['sname'];
        $total = $rerow['total'];
        $attended = $rerow['attended'];
        $sqldall = "DELETE FROM sub$next where uid=$uid";
        mysqli_query($con,$sqldall);
        $sqliall = "INSERT INTO sub$i(uid,uname,sname,total,attended) VALUES ('$id','$name','$sub','$total','$attended')";
        mysqli_query($con,$sqliall);
    }
    header("Location:../settings.php?edit=success");
    exit();

?>