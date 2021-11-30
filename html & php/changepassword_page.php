<?php
include("connect.php");
session_start();

if(!isset($_SESSION['username'])){
      header("location: login_page.php");
}

if (isset($_GET['loginpasschangeFailed'])) {
        $message = "Fill the correct old login password";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
if(isset($_GET['transpasschangeFailed'])) {
	$message = "Fill the correct old transaction password";
	echo "<script type='text/javascript'>alert('$message');</script>";
}


?>






<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<link rel="stylesheet" type="text/css" href="../css/base.css">
	<link rel="stylesheet" type="text/css" href="../css/services.css">
	<script type="text/javascript" src="../js/check.js"></script>
	
</head>
<body>
	
	<script src="../js/canvas.js"></script>
  <img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="100" height="50">
<map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom1" href="dashboard_page.php">
</map>
<a href="logout_action.php">
      <button type="submit" class="logout">Log Out</button>
    </a>
	
	<div class="changepass">

		<div class="primary" id="primary1">
			<h1>Change Password</h1>
			<input type="radio" name="passchange" id="loginpass" value="loginpass" onclick="document.getElementById('loginpasschange').style.display= 'block'; document.getElementById('primary1').style.display = 'none';">
			<label for="loginpass">Change of Login Password</label><br><br>
			<input type="radio" name="passchange" id="transpass" value="transpass"onclick="document.getElementById('transpasschange').style.display= 'block';document.getElementById('primary1').style.display = 'none';">
			<label for="transpass">Change of Transaction Password</label>
		</div>
		<div class="loginpasschange" id="loginpasschange">
			<span class="back1" onclick="document.getElementById('primary1').style.display = 'block';document.getElementById('loginpasschange').style.display= 'none';" style="font-size: 20pt;">&larr;</span>
			<h1>Change Login Password</h1>
			<form action="loginpasschange_action.php" method="post">
			<label for="oldlogpass">Enter Old Login Password <font size="2">&#9733;</font> :&nbsp;
			<input type="password" name="oldlogpass" id="oldlogpass" required></label><br><br>
			<label for="newlogpass">Enter New Login Password <font size="2">&#9733;</font> :&nbsp;
			<input type="password" name="newlogpass" id="newlogpass" onchange="CheckPassword1(newlogpass);" required></label><br><br>
			<label for="renewlogpass">Confirm New Login Password <font size="2">&#9733;</font> :&nbsp;
			<input type="password" name="renewlogpass" id="renewlogpass" onkeyup="check(newlogpass,renewlogpass,message2);" required><span id='message2'></span></label><br><br>
			<font size="2">&#9733; mandatory fiels</font><br><br>
			<input type="submit" value="Submit" class="btn1" name="loginpasschangebtn"></form>
		</div>
		<div class="transpasschange" id="transpasschange">
			
			<span class="back2" onclick="document.getElementById('primary1').style.display = 'block';document.getElementById('transpasschange').style.display= 'none';" style="font-size: 20pt;">&larr;</span>
			<h1>Change Transaction Password</h1>
			<form action="transpasschange_action.php" method="post">
			<label for="oldtranspass">Enter Old Transaction Password <font size="2">&#9733;</font> :&nbsp;
			<input type="password" name="oldtranspass" id="oldtranspass"></label><br><br>
			<label for="newlogpass">Enter New Transaction Password <font size="2">&#9733;</font> :&nbsp;
			<input type="password" name="newtranspass" id="newtranspass" onchange="CheckPassword1(newtranspass);"></label><br><br>
			<label for="renewlogpass">Confirm New Transaction Password <font size="2">&#9733;</font> :&nbsp;
			<input type="password" name="renewtranspass" id="renewtranspass"onkeyup="check(newtranspass,renewtranspass,message3);"><span id='message3'></span></label><br><br>
			<font size="2">&#9733; mandatory fiels</font><br><br>
			<input type="submit" class="btn1" name="transactionpasschangebtn" value="Submit"></form>
		</div>
	</div>

<footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>

</body>
</html>