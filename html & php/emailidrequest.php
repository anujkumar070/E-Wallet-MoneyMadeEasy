<?php

include("connect.php");
session_start();

if (isset($_POST['emailidreqbtn'])) {
	$email = $_POST['emailid'];
	$query1 = "SELECT * FROM useraccounts WHERE email = '".$email."'";
	$result1 = mysqli_query($con, $query1);
	if($result1 && mysqli_num_rows($result1) > 0)
	{

	$_SESSION['email'] = $email;


	$rndno=rand(100000, 999999);
  $message = urlencode("otp number.".$rndno);
  $to = $_SESSION['email'];
  $subject = "Your MME OTP";
  $txt = "Your OTP to complete your login password change process is:" .$rndno;
  $headers = "From: mme234445@gmail.com";
  mail($to, $subject, $txt, $headers);

  $_SESSION['otp'] = $rndno;
  header("location: enterotpforgotpassword.php");
  die;
}
else
{
	die(header("location: emailidrequest.php?emailidFailed=true"));
}
}

if(isset($_GET['emailidFailed'])){
	$message = "This email is not registered with MME, either create a new account or try to remember your registered email id";
	echo "<script type='text/javascript'>alert('$message');</script>";
}

?>





<!DOCTYPE html>
<html>
<head>
	<title>Enter Email Id</title>
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
  <area shape="rect" coords="0,0,200,80" alt="hom" href="home_page.html">
</map>
<a href="signup_page.php">
      <button type="submit" class="signup">Sign Up</button>
    </a>
    <a href="login_page.php">
      <button type="submit" class="home">Log In</button>
    </a>
	<div class="otp" style="padding-top: 20px;">
		<form action="emailidrequest.php" method="post">
		<label for="otp" style="font-size: 20pt">Please enter the Email Id registered with your MME Account:</label><br><br>
		<input type="text" name="emailid" id="email" onchange="checkEmail(email);"><br><br><br>
		<input type="submit" class="btn1" style="width: 150px; height: 75px;" value="Submit" name="emailidreqbtn"></form>
</div>
</body>
</html>