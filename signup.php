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
        <div class="main-card main-card-registration">
        <h2>TRACK iT</h2>
        
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="username" id="uname" placeholder="Username">
            <input type="email" name="uemail" id="uemail" placeholder="Email">
            <input type="password" name="upwd" id="upwd" placeholder="Password">
            <input type="password" name="upwd-confirm" id="upwd-confirm" placeholder="Confirm Password">
            <button type="submit" name="signup-submit" id="signup-submit">Next<i class="fas fa-long-arrow-alt-right"></i></button>
        </form>
        <?php

            if(isset($_GET['error']))
            {
                if($_GET['error'] == "emptyfield")
                {
                    echo "<p class='error-msg'>Something is missing</p>";
                }
                else if($_GET['error'] == "invalidemail")
                {
                    echo "<p class='error-msg'>Email sholud be in correct format('abc@gmail.com)</p>";
                }
                else if($_GET['error'] == "incorrectpassword")
                {
                    echo "<p class='error-msg'>Password does not match</p>";
                }
                else if($_GET['error'] == "sqlerror")
                {
                    echo "<p class='error-msg'>Database Error</p>";
                }
                else if($_GET['error'] == "usernametaken")
                {
                    echo "<p class='error-msg'>Username already taken</p>";
                }
                else
                {

                }
            }
            else if(isset($_GET['signup'])){
                if($_GET['signup'] == "success")
                {
                    echo "<p class='success-msg'>Signup Successful</p>";
                }
            }
        
        ?>
        </div>
    </div>
</body>
</html>