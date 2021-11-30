<?php
include("connect.php");
session_start();

if(!isset($_SESSION['username']))
{
	header("location: login_page.php");
} ?>


<!DOCTYPE html>
<html>
<head>
	<title>Delete Account</title>
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<link rel="stylesheet" type="text/css" href="../css/base.css">
	<link rel="stylesheet" type="text/css" href="../css/services.css">
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
  <div class="topnav">
  <a href="dashboard_page.php" id="dashboard">Dashboard</a>
  <a href="transaction_page.php" id="trans">Transaction</a>
  <a href="transactionhistory_page.php" id="transhis">Transaction History</a>
  <a href="checkbalancepage.php" id="bal">Check Balance</a>
  <a class="active" href="deleteacc_page.php" id="del">Delete Account</a>
  <a href="contactpage.php" id="contact">Contact</a>
</div>
    
	<div class="delacc">
		<form action="deleteacc_action.php" method="post">
		<center><h1>Delete Account</h1></center>
		<p><b>Please fill in this form so that we can better ourselves</b></p>
		<p>Q.1 Why are you Deleting your MME Account?</p>
		<input type="radio" name="reasondelacc" id="betterservice" value="betterservice">
		<label for="betterservice">I discovered another application providing better services than MME</label><br><br>
		<input type="radio" name="reasondelacc" id="timecons" value="timecons">
		<label for="betterservice">MME is time consuming to use, I will better go to bank</label><br><br><br>
		<p>Q.2 What exactly did you not like about MME?</p>
		<input type="radio" name="lMME" id="userinterface" value="userinterface">
		<label for="userinterface">User Interface is not user-friendly</label><br><br>
		<input type="radio" name="lMME" id="noservices" value="noservices">
		<label for="noservices">The number of services are less</label><br><br><br>
		<p>Q.3 Any other suggestions from your side?</p>
		<textarea id="suggestions" name="suggestions" placeholder="Enter your Suggestions" rows="5" cols="50"></textarea><br><br>
		<center><input type="submit" style="width: 200px; height: 65px" class="btn1" value="Submit" name="deleteaccbtn"></form>
</div>

<footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>
</body>
</html>
