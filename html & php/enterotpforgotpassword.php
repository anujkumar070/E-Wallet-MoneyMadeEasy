<?php
include("connect.php");
session_start();

if(isset($_POST['forgotpassotp']))
{
   $rno=$_SESSION['otp'];
   $urno=$_POST['otpval'];
   if(!strcmp($rno,$urno))
   {
    $email = $_SESSION['email'];
    $updated_pass = $_SESSION['new_pass'];
    $query1 = "UPDATE useraccounts SET login_password = '".$updated_pass."' WHERE email = '".$email."'";
    mysqli_query($con, $query1);
    header("location: confirmforgotpassword.php");
    die;
   }
   else
   {

    die(header("location: enterotpforgotpassword.php?forgotpassFailed=true"));
   }
}





  ?>

  <?php 
  if (isset($_GET['forgotpassFailed'])) {
        $message = "You are not a MME User. Please Sign Up first.";
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
		<form action="enterotpforgotpassword.php" method="post">
		<label for="otp" style="font-size: 20pt">Enter OTP sent to your registered email:</label><br><br>
		<input type="text" name="otpval" id="otpval" onchange="checkotp(otp);" required style="height:20px;"><br><br><br>
		<input type="submit" class="btn1" style="width: 150px; height: 75px;" value="Submit" name="forgotpassotp"></form>
</div>
</body>
</html>