<?php
include("connect.php");
session_start();

if(!isset($_SESSION['username']))
{
  header("location: login_page.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact</title>
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
  <a href="deleteacc_page.php" id="del">Delete Account</a>
  <a class="active" href="contactpage.php" id="contact">Contact</a>
</div>
<div style="padding-left: 20px; padding-right:20px; padding-top:20px;">
	<h2>Contact details if you find any difficulty while using MME</h2><br>
	Customer Care No.: <span style='font-size:20px;'>&#9742; </span>+91XXXXXXXXXX<br><br>
	Email:<span style='font-size:25px;'> &#x1F4E7; </span> ewallet.moneymadeeasy@gmail.com<br><br>
</div>
<footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>

</body>
</html>