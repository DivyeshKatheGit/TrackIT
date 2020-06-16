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
    <title>Feedback</title>
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
                    <li class="menu-item"><a href="settings.php"><i class="fas fa-cog"></i><p class="list-text">Setting</p></a></li>
                    <li class="menu-item"><a href="#"><i class="far fa-comment-alt"></i><p class="list-text">Feedback</p></a></li>
                </div>
            </div>
        </section>
        <section class="board">
            <div class="board-head">
                <h2>Feedback</h2>
                <h3><?php
                    echo $_SESSION['user'];
                ?>
                </h3>
            </div>
            <div class="board-main">
                <h2>How do you feel about this product?</h2>
                <form action="includes/feedback.inc.php" method="post">
                    <textarea name="feedback-text" id="" cols="90" rows="20" class="feedback-text" placeholder="Your Feedback"></textarea>
                    <input type="text" name="username" id="uname" placeholder="Name">
                    <button type="submit" name="submit">Submit</button>
                    <?php

                        if(isset($_GET['error']))
                        {
                            echo "<p class='error-msg'>Something is missing</p>";
                        }
                        elseif(isset($_GET['insert']))
                        {
                            echo "<p class='success-msg'>Feedback recorded successfully.</p>";
                        }

                    ?>
                </form> 
            </div>
        </section>
    </div>
    
</body>
</html>