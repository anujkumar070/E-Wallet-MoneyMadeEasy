<?php

include("connect.php");
session_start();

if (isset($_POST['fpassbtn'])) {
    $new_pass = $_POST['newlogpass'];
    $_SESSION['new_pass'] = $new_pass;
    header("location: emailidrequest.php");
    die;
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
	
  <img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="100" height="50">
<map name="logomap">
  <area shape="rect" coords="0,0,200,80">
</map>
<div>
<h1>Change Login Password</h1>
			
			<form action="forgotpasswordpage.php" method="post">
			<label for="newlogpass">Enter New Login Password <font size="2">&#9733;</font> :&nbsp;
			<input type="password" name="newlogpass" id="newlogpass" onchange="CheckPassword1(newlogpass);" required></label><br><br>
			<label for="renewlogpass">&nbsp&nbsp&nbsp&nbsp&nbspConfirm New Login Password <font size="2">&#9733;</font> :&nbsp;
			<input type="password" name="renewlogpass" id="renewlogpass" onkeyup="check(newlogpass,renewlogpass,message2);" required><span id='message2'></span></label><br><br>
			<font size="2">&#9733; mandatory fiels</font><br><br>
			<input type="submit" value="Submit" class="btn1" name="fpassbtn"></form></div></body></html>