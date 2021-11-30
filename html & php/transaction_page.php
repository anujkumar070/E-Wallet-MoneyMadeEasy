<?php 
include("connect.php");
session_start();
if(!isset($_SESSION['username']))
{
  header("location: login_page.php");
}
$query1 = "SELECT * FROM bankaccounts WHERE account_no = '".$_SESSION['account_no']."'";
$result1 = mysqli_query($con, $query1);
if($result1 && mysqli_num_rows($result1) > 0)
{
  $acc_data = mysqli_fetch_assoc($result1);
  $balance = $acc_data['balance'];
}   

if (isset($_GET['transFailed1'])) {
        $message1 = "Insufficient Balance.";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }

if(isset($_GET['transFailed2'])){
  $message = "Wrong Transaction Password filled! Please try again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
?>




<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaction</title>
  <script type="text/javascript" src="../js/check.js"></script>
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<link rel="stylesheet" type="text/css" href="../css/base.css">
	<link rel="stylesheet" type="text/css" href="../css/services.css">
</head>
<body>
  <img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="100" height="50">
<map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom1" href="dashboard_page.php">
</map>
<a href="logout_action.php">
  <button type="submit" class="logout">Log Out</button>
    </a>
  <div class="topnav">
  <a href="dashboard_page.php" id="dashboard">Dashboard</a>
  <a class="active" href="transaction_page.php" id="trans">Transaction</a>
  <a href="transactionhistory_page.php" id="transhis">Transaction History</a>
  <a href="checkbalancepage.php" id="bal">Check Balance</a>
  <a href="deleteacc_page.php" id="del">Delete Account</a>
  <a href="contactpage.php" id="contact">Contact</a>
</div>

              <div><h1>Welcome to Transaction page</h1>
	<table>
          <form action="transaction_action.php" method="post">
        
		<tr><td><label for="pacno">Beneficiary Account No. <font size="2">&#9733;</font> :&nbsp; </label>
		<td><input type="text" id="pacno" name="pacno" placeholder="Enter your Account Number" size="40" required onchange="checkbankacc(pacno);"><br><br>
        
		<tr><td><label for="tacno">Re-enter Beneficiary Account Number <font size="2">&#9733;</font> &nbsp;:&nbsp; </label>
		<td><input type="text" id="tacno" name="tacno" placeholder="Enter Beneficiary Account Number" size="40" required onchange="checkbankacc(tacno); check(pacno, tacno, message);" onfocus="hide(pacno);" onblur="show1(pacno);">&nbsp;<span id="message"></span><br><br>
        
		<tr><td><label for="amonut">Amount <font size="2">&#9733;</font> &nbsp;:&nbsp;</label>
		<td><input type="text" id="amount" name="amount" placeholder="Enter Amount to be transferred" size="40" required onchange="checkamount(amount);" onfocus="show(span1);" onblur="document.getElementById('span1').style.display='none';"></label>
		<tr><td><td><font style="font-size: 12px;"> Balance:<?php echo $balance; ?></font><span id="span1" style="display: none;">&#9432; The lower limit for transaction is 100 and upper limit for transaction is 1000000</span><br><br>
        
		<tr><td><label for="password">Transaction Password<font size="2">&#9733;</font> &nbsp;:&nbsp; </label>
		<td><input type="password" id="pw" name="pw" placeholder="Enter Transaction Password" size="40" required onchange="CheckPassword1(pw);"><br><br>
        		<font size="2">&#9733; mandatory fields</font><br><br>
        		<tr><td colspan="2"><input type="submit" name="transbtn" value="Submit" class="btn1"></form>
	</table>
    </div>

<footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>
</body>
</html>