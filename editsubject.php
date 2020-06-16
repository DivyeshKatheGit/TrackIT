<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashstyle.css">
    <title>Document</title>
</head>
<body>
    <div class="main-form">

    <?php

    session_start();
    require 'includes/dbh.inc.php';
    $uid = $_SESSION['id'];
    $uname = $_SESSION['user'];
    $table = "";
    if(isset($_POST['b1-edit']))
    {
        $table = "sub1";
    }
    elseif(isset($_POST['b2-edit']))
    {
        $table = "sub2";
    }
    elseif(isset($_POST['b3-edit']))
    {
        $table = "sub3";
    }
    elseif(isset($_POST['b4-edit']))
    {
        $table = "sub4";
    }
    elseif(isset($_POST['b5-edit']))
    {
        $table = "sub5";
    }
    elseif(isset($_POST['b6-edit']))
    {
        $table = "sub6";
    }
    elseif(isset($_POST['b7-edit']))
    {
        $table = "sub7";
    }
    elseif(isset($_POST['b8-edit']))
    {
        $table = "sub8";
    }
    elseif(isset($_POST['b9-edit']))
    {
        $table = "sub9";
    }
    elseif(isset($_POST['b10-edit']))
    {
        $table = "sub10";
    }
    else {
        
    }
    $sqlssub = "select * from $table where uid=$uid";
    $result = mysqli_query($con,$sqlssub);
    $row = mysqli_fetch_assoc($result);
    $subname = $row['sname'];
    $total = $row['total'];
    $attended = $row['attended'];
    $_SESSION['table'] = $table;
    echo '
        <form action="includes/editsubdata.inc.php" method="post">
            <div class="input-field">
                <label for="subject">Subject Name</label>
                <input type="text" name="subject" id="sname" placeholder="'.$subname.'">
            </div>
            <div class="input-field">
                <label for="attended">Classes Attended</label>
                <input type="text" name="attended" id="attended" placeholder="'.$attended.'">
            </div>
            <div class="input-field">
                <label for="total">Total Classes</label>
                <input type="text" name="total" id="total" placeholder="'.$total.'">
            </div>
            <button type="submit" name="login-submit" id="signup-submit">Save</button>
        </form>
    ';

    ?>
    </div>

</body>
</html>
