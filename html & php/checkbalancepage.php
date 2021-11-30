<?php
include("connect.php");
session_start();


if(!isset($_SESSION['username']))
{
	header("location: login_page.php");
}
$account = $_SESSION['account_no'];
$query1 = "SELECT * FROM bankaccounts WHERE account_no = '".$account."'";
$result1 = mysqli_query($con, $query1);

if($result1 && mysqli_num_rows($result1))
{
	$acc_data1 = mysqli_fetch_assoc($result1);
	$balance = $acc_data1['balance'];
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<title>Check Balance</title>
	<link rel="stylesheet" type="text/css" href="../css/base.css">
  <link rel="stylesheet" type="text/css" href="../css/services.css">
</head>
<body>

      <script type="text/javascript" src="../js/canvas.js"></script>
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
  <a class="active" href="checkbalancepage.php" id="bal">Check Balance</a>
  <a href="deleteacc_page.php" id="del">Delete Account</a>
  <a href="contactpage.php" id="contact">Contact</a>
</div>
    <div><br><br><br><br><br><br><br><br><font style="font-size:40px; font-weight: italic; font:"perpetua">Your Account Balance is : &#8377 <?php echo $balance; ?></font>
      <br><br></div>
<footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>
</body>
</html>
