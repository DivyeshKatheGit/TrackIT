<?php

require 'dbh.inc.php';
if($con && isset($_POST['signup-submit']))
{
    
    $username = $_POST['username'];
    $uemail = $_POST['uemail'];
    $upwd = $_POST['upwd'];
    $cupwd = $_POST['upwd-confirm'];
    if(empty($username) || empty($uemail) || empty($upwd) || empty($cupwd))
    {
        header("Location:../signup.php?error=emptyfield&username=".$username."&uemail=".$uemail);
        exit();
    }
    else if(!filter_var($uemail,FILTER_VALIDATE_EMAIL))
    {
        header("Location:../signup.php?error=invalidemail&username=".$username);
        exit();
    }
    else if($upwd != $cupwd)
    {
        header("Location:../signup.php?error=incorrectpassword&username=".$username."&uemail=".$uemail);
        exit();
    }
    else {
        $sql = "select uname from users where uname=?";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location:../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if($result > 0)
            {
                header("Location:../signup.php?error=usernametaken&uemail".$uemail);
                exit();
            }
            else {
                $insertsql = "INSERT INTO users(uname,uemail,upwd) VALUES(?,?,?)";
                $insertstmt = mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($insertstmt,$insertsql))
                {
                    header("Location:../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($insertstmt,"sss",$username,$uemail,$upwd);
                    mysqli_stmt_execute($insertstmt);
                    header("Location:../signup.php?signup=success");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);

    }
    mysqli_close($con);
}
else {
    header("Location:../index.php");
    exit();
}
?>