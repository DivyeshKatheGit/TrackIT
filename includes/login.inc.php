<?php

    require 'dbh.inc.php';
    if(isset($_POST['login-submit']))
    {
        $username = $_POST['username'];
        $upwd = $_POST['upwd'];
        if(empty($username) || empty($upwd))
        {
            header("Location:../login.php?error=emptyfield&username=".$username);
            exit();
        }
        else {
            $sql = "SELECT * FROM users where uname=?;";
            $stmt = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location:../login.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt,"s",$username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result))
                {
                    if($upwd != $row['upwd'])
                    {
                        header("Location:../login.php?error=incorrectpassword");
                        exit();
                    }
                    else {
                        session_start();
                        $_SESSION['id'] = $row['uid'];
                        $_SESSION['user'] = $row['uname'];
                        $_SESSION['email'] = $row['uemail'];
                        header("Location:../dashboard.php");
                        exit();
                    }
                }
                else {
                    header("Location:../login.php?error=nouser");
                    exit();
                }
            }
        }
    }
    else {
        header("Location:../index.php");
        exit();
    }

?>