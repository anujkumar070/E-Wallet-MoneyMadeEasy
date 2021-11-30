<?php 
include("connect.php");
session_start();

if(!isset($_SESSION['username']))
{
	header("location: login_page.php");
}

if (isset($_POST['otpdeleteacc'])) {
	$rno=$_SESSION['otp'];
   $urno=$_POST['otpval'];
   if(!strcmp($rno,$urno))
   {
    $username = $_SESSION['username'];
    $query1 = "DELETE FROM useraccounts WHERE username = '".$username."'";
    mysqli_query($con, $query1);
    header("location: confirmdeleteaccount.php");
    die;
   }
   else
   {
    die(header("location: enterotpdeleteaccount.php?deleteaccFailed=true"));
   }
}


if(isset($_GET['deleteaccFailed'])){
	$message = "Invalid OTP! Account not deleted, try again.";
	echo "<script type='text/javascript'>alert('$message');</script>";
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Enter OTP</title>
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<link rel="stylesheet" type="text/css" href="../css/base.css">
	<link rel="stylesheet" type="text/css" href="../css/services.css">
	<script type="text/javascript" src="../js/check.js"></script>
</head>
<body>
	<canvas></canvas>
	<script src="../js/canvas.js"></script>
  <img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="100" height="50">
<map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom1" href="dashboard_page.php">
</map>
<a href="logout_action.php">
      <button type="submit" class="logout">Log Out</button>
    </a>
	<div class="otp" style="padding-top: 20px;">
		<form action="enterotpdeleteaccount.php" method="post">
		<label for="otp" style="font-size: 20pt">Enter OTP sent to your registered email:</label><br><br>
		<input type="text" name="otpval" id="otp" onchange="checkotp(otp);" required><br><br><br>
		<input type="submit" class="btn1" style="width: 150px; height: 75px;" value="Submit" name="otpdeleteacc"></form>
</div>
</body>
</html>