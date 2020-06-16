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
    <script src="./js/app.js" defer></script>
    <title>Settings</title>
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
                    <li class="menu-item"><a href="dashboard.php"><i class="fas fa-home"></i><p class="list-text">Home</p></a></li>
                    <li class="menu-item"><a href="#"><i class="far fa-calendar-check"></i><p class="list-text">Calendar</p></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-info"></i><p class="list-text">About Us</p></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-cog"></i><p class="list-text">Setting</p></a></li>
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
            <div class="board-settings">

                <div class="edit-subjects">
                    <h1>Subjects</h1>
                    <?php

                        $sqlssub = "select * from users where uid=$uid";
                        $result = mysqli_query($con,$sqlssub);
                        $row = mysqli_fetch_assoc($result);
                        $subjects = $row['subjects'];
                        $subname = "";
                        for($i=1;$i<=$subjects;$i++)
                        {
                            $table = "sub".$i;
                            //echo "<br>From table ".$table."<br>";
                            $sqlsall = "select sname from $table where uid=$uid";
                            $records = mysqli_query($con,$sqlsall);
                            $rerow = mysqli_fetch_assoc($records);
                            echo '<div class="subject-card">
                                    <h2>'.$rerow['sname'].'</h2>
                                    <div class="options">
                                    <form action="editsubject.php" method="post">
                                        <button type="submit" id="edit" name="b'.$i.'-edit"><i class="fas fa-edit"></i></button>
                                    </form>
                                    <form action="includes/delete.inc.php" method="post">
                                        <button type="submit" id="delete" name="b'.$i.'-delete"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                    </div>
                                </div>';
                        }
                        ?>
                </div>
                <div class="edit-criteria">
                    <?php

                        $criteria = $row['criteria'];
                        echo '
                            <h2>Attendance Criteria</h2>
                            <div class="circle">
                                <svg>
                                <circle cx="250" cy="200" r="170" id="c1"></circle>  
                                <circle cx="250" cy="200" r="170" id="c2" style="stroke-dashoffset: calc(1070 - (1070*'.$criteria.')/100);"></circle> 
                                </svg>
                                 <h2 class="percent">'.$criteria.'<span>%</span></h2>
                            </div>
                            <form action="includes/changecriteria.inc.php" method="post">
                                <input type="range" name="range" id="range" value='.$criteria.'>
                                <button type="submit" name="submit">Save</button>
                            </form>';
                   ?>
                    
                </div>

            </div>
        </section>
        <script>
            
        </script>
</div>
</body>
</html>