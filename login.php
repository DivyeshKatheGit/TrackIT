<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/ls.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <title>Registration</title>
</head>
<body>
    <div class="main-register">
        
        <div class="main-card main-card-login">

            <h2>TRACK iT</h2>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" id="uname" placeholder="Username">
                <input type="password" name="upwd" id="upwd" placeholder="Password">
                <button type="submit" name="login-submit" id="signup-submit">Next<i class="fas fa-long-arrow-alt-right"></i></button>
            </form>
            <?php

                if(isset($_GET['error']))
                {
                    if($_GET['error'] == "emptyfield")
                    {
                        echo "<p class='error-msg'>Something is missing</p>";
                    }
                    else if($_GET['error'] == "incorrectpassword")
                    {
                        echo "<p class='error-msg'>Password does not match</p>";
                    }
                    else if($_GET['error'] == "sqlerror")
                    {
                        echo "<p class='error-msg'>Database Error</p>";
                    }
                    else if($_GET['error'] == "nouser")
                    {
                        echo "<p class='error-msg'>Username is incorrect</p>";
                    }
                    else
                    {

                    }
                }

                ?>
        </div>
        
    </div>
    </body>
</html>