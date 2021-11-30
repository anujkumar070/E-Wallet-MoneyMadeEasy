<?php
include ("connect.php");

session_start();

if(!isset($_SESSION['username'])){
      header("location: login_page.php");
}

   if(isset($_POST['loginpassotp']))
  {
   $rno=$_SESSION['otp'];
   $urno=$_POST['otpval'];
   if(!strcmp($rno,$urno))
   {
    $username = $_SESSION['username'];
    $updated_pass = $_SESSION['newlogpass'];
    $query1 = "UPDATE useraccounts SET login_password = '$updated_pass' WHERE username = '$username'";
    mysqli_query($con, $query1);
    header("location: confirmloginpasswordchange.php");
    die;
   }
   else
   {
    die(header("location: enterotploginpasswordchange.php?loginotpFailed=true"));
   }
}



?>

<?php
if (isset($_GET['loginotpFailed'])) {
        $message = "Incorrect OTP! Your Login Password didn't change.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
    } ?>




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
		<form action="enterotploginpasswordchange.php" method="post">
		<label for="otp" style="font-size: 20pt">Enter OTP sent to your registered email:</label><br><br>
		<input type="text" name="otpval" id="otpval" onchange="checkotp(otp);" required style="height:20px;"><br><br><br>
		<input type="submit" class="btn1" style="width: 150px; height: 75px;" value="Submit" name="loginpassotp"></form>
</div>
</body>
</html>