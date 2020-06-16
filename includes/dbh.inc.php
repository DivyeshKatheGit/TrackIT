<?php

$server = "localhost";
$dbusername = "root";
$dbuserpwd = "";
$dbname = "trackit_database";


$con = new mysqli($server,$dbusername,$dbuserpwd,$dbname);
if(!con)
{
	die('Could not Connect : '.mysqli_error());
}


?>