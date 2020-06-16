<?php
    session_start();
    require 'includes/dbh.inc.php';
    $uid = $_SESSION['id'];
    $uname = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/dashstyle.css">
    <script src="./js/text.js" defer></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="main-sec">
        <section class="menusec">
            <div class="burger-menu">
                <div class="line line-1"></div>
                <div class="line line-2"></div>
                <div class="line line-3"></div>
            </div>
            <div class="menu-list-active">
                <div class="menu-icons">
                    <li class="menu-item"><a href="#"><i class="fas fa-home"></i><p class="list-text">Home</p></a></li>
                    <li class="menu-item"><a href="#"><i class="far fa-calendar-check"></i><p class="list-text">Calendar</p></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-info"></i><p class="list-text">About Us</p></a></li>
                    <li class="menu-item"><a href="settings.php"><i class="fas fa-cog"></i><p class="list-text">Setting</p></a></li>
                    <li class="menu-item"><a href="feedback.php"><i class="far fa-comment-alt"></i><p class="list-text">Feedback</p></a></li>
                </div>
            </div>
        </section>
        <section class="board">
            <div class="board-head">
                <h2>Settings</h2>
                <h3><?php
                    echo $_SESSION['user'];
                ?>
                </h3>
            </div>
            <div class="subject-date">
                <div class="subjectAdd">
                    <form action="dashboard.php" method="post">
                        <div class="sub-input">
                            <input type="text" name="subject" id="subject" placeholder="Add Subject">
                            <button type="submit" name="submit" id="submit"><i class="fas fa-plus"></i></button>
                        </div>
                    </form>
                </div>
                <div class="date">
                    <?php

                        echo date('d-m-y');

                    ?>
                </div>
            </div>
            
            <?php
                
                $sqlssub = "select * from users where uid=$uid";
                $result = mysqli_query($con,$sqlssub);
                $row = mysqli_fetch_assoc($result);
                $subjects = $row['subjects'];
                $criteria = $row['criteria'];
                $subname = "";
            //echo "<br>subjects ".$subjects."<br>";
                if(isset($_POST['submit']))
                {
                    if(!empty($_POST['subject']))
                    {
                        if($subjects!=10)
                        {
                            $subname = $_POST['subject'];
                            echo $subname."<br>";
                            $sqlusub = "UPDATE users SET subjects=subjects+1 where uid=$uid";
                            mysqli_query($con,$sqlusub);
                            $result = mysqli_query($con,$sqlssub);
                            $row = mysqli_fetch_assoc($result);
                            $subjects = $row['subjects'];
                            $table = "sub".$subjects;
                            $sqlisub = "INSERT INTO $table(uid,uname,sname) VALUES ('$uid','$uname','$subname')";
                            mysqli_query($con,$sqlisub);
                            header("Location:dashboard.php");
                            exit();
                            echo "<br>done";
                        }
                        else 
                        {
                            echo "<p class='error-msg'>You cannot add more than 10 subjects<p>";
                        }
                    }
                    else 
                    {
                        echo "<p class='error-msg'>something is missing<p>";
                    }
                    
                }
                //echo "<br>".$subjects."<br>";

            ?>
            <?php  
                for($i=1;$i<=$subjects;$i++)
                {
                    $table = "sub".$i;
                    //echo "<br>From table ".$table."<br>";
                    $sqlsall = "select * from $table where uid=$uid";
                    $records = mysqli_query($con,$sqlsall);
                    $rerow = mysqli_fetch_assoc($records);
                    $total = $rerow['total'];
                    $attended = $rerow['attended'];
                    $history = $rerow['history'];
                    $len = strlen($history);
                    $color = '#ff5964';
                    if($total==0)
                    {
                        $percent = 0;
                    }
                    else {
                        $percent = round(($attended/$total)*100);
                    }
                    if($percent>=$criteria)
                    {
                        $color = '#14c620';
                    }
                    if($i%3==1)
                    {
                        echo '<div class="subject-cards">';
                    }
                    echo '<div class="card">
                            <div class="subject">
                                <p class="sub-name">'.$rerow['sname'].'</p>
                            <div class="history">';
                            if($history=="-1")
                            {
                                for($j=1;$j<=5;$j++)
                                {
                                    $marked = "#ffffff";
                                    //echo $i;
                                    echo '<div class="mark" style="background : '.$marked.';"></div>';
                                }
                            }
                            else
                            {
                                $currentindx = $len-1;
                                for($j=1;$j<=5;$j++)
                                {
                                    $marked = "#ffffff";
                                    if($currentindx!=-1)
                                    {
                                        $current = $history[$currentindx];
                                        if($current=="1")
                                        {
                                            $marked = "#14c620";
                                        }
                                        else
                                        {
                                            $marked = "#ff5964";
                                        }
                                        $currentindx=$currentindx-1;
                                    }
                                    else {
                                        
                                    }
                                    echo '<div class="mark" style="background : '.$marked.';"></div>';
                                }
                                    //echo $len;
                            }
                                        
                   echo '</div>
                            </div>
                                <div class="attendance-count">
                                    <span class="attend">Attendance</span>
                                    <span class="attended">'.$attended.'</span>
                                    <span class="slash">/</span>
                                    <span class="total">'.$total.'</span>
                                </div>
                                <div class="display">
                                    <div class="percentage">
                                        <svg>
                                            <circle cx="40" cy="40" r="30" style="stroke-dashoffset: calc(190 - (190*'.$percent.')/100); stroke: '.$color.'"></circle>
                                        </svg>
                                        <div class="text">'.$percent.'<span>%</span></div>
                                    </div>
                                    <div class="btn">
                                        <form action="includes/edit.inc.php" method="post">
                                            <button type="submit" class="sub sub-right sub1" name="b'.$i.'-right"><i class="fas fa-check"></i></button>
                                        </form>
                                        <form action="includes/edit.inc.php" method="post">
                                            <button type="submit" class="sub sub-wrong sub1" name="b'.$i.'-wrong"><i class="fas fa-times"></i></button>
                                        </form>
                                    </div>
                                    <form action="includes/undo.inc.php" method="post" class="undo-form">
                                        <abbr title="undo"><button class="undo" type="submit" name="b'.$i.'-undo"><i class="fas fa-undo-alt"></i></button></abbr>
                                    </form>
                                </div>
                            </div>';
                    if($i%3==0)
                    {
                        echo '</div>';
                    }
                }
            ?>
        </section>
    </div>
    
</body>
</html>