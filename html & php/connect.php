<?php
$servername = "localhost";
// Enter your MySQL username below(default=root)
$username = "root";
// Enter your MySQL password below
$password = "";
$dbname = "mme";

if(!$con = mysqli_connect($servername, $username, $password, $dbname))
{
    die("failed to connect!- Anuj");
}