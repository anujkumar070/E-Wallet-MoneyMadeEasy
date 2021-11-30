<?php
session_start();

if(!isset($_SESSION['username'])){
      header("location: Welcome_page.php");
}


?>



<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
  <title>Dashboard</title>
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
  <a class="active" href="dashboard_page.php" id="dashboard">Dashboard</a>
  <a href="transaction_page.php" id="trans">Transaction</a>
  <a href="transactionhistory_page.php" id="transhis">Transaction History</a>
  <a href="checkbalancepage.php" id="bal">Check Balance</a>
  <a href="deleteacc_page.php" id="del">Delete Account</a>
  <a href="contactpage.php" id="contact">Contact</a>
</div>
<div class="accountinfo">
  <h1>Account Details</h1>
  <b class="userinfo">Account No. </b> : <?php echo $_SESSION['account_no']; ?> <br><br>
    <b class="userinfo">Username </b> : <?php echo $_SESSION['username']; ?><br><br>
    <a href="changeusername_page.php"><button type="submit" class="username" style="width:200px; height: 80px;">Change Username</button></a>
    <a href="changepassword_page.php"><button type="submit" style="width: 200px; height: 80px;">Change Password</button></a>

</div>
<footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>

</body>
</html>