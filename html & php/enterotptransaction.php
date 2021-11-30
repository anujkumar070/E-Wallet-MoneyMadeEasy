<?php
include ("connect.php");

session_start();
if(!isset($_SESSION['username'])){
      header("location: login_page.php");
}

   if(isset($_POST['transotp']))
  {
   $rno=$_SESSION['otp'];
   $urno=$_POST['otpval'];
   if(!strcmp($rno,$urno))
   {
    $query1 = "SELECT * FROM bankaccounts WHERE account_no = '".$_SESSION['accnt']."'";
    $result1 = mysqli_query($con, $query1);
    if ($result1 && mysqli_num_rows($result1) > 0) {
        $acc_data1 = mysqli_fetch_assoc($result1);
        $balance1 = $acc_data1['balance'];
        $balance = $_SESSION['balance'];
        $amount = $_SESSION['amount'];
        $account = $_SESSION['account_no'];
        $accnt = $_SESSION['accnt'];
        $updated_sender_balance = $balance - $amount;
        $query2 = "UPDATE bankaccounts SET balance = '".$updated_sender_balance."' WHERE account_no = '".$account."'";
        mysqli_query($con, $query2);
        date_default_timezone_set('Asia/Kolkata');
            $tdate = date("Y-m-d");
            $ttime = date("H:i:s"); 
            $query3 = "INSERT INTO transactions (from_account_no, to_account_no, amount, tdate, ttime) values('$account','$accnt', '$amount', '$tdate', '$ttime')";
            mysqli_query($con, $query3);
        $updated_receiver_balance = $balance1 + $amount;
        $query4 = "UPDATE bankaccounts SET balance = '".$updated_receiver_balance."' WHERE account_no = '".$accnt."'";
        mysqli_query($con, $query4);
        header("location: confirmtransaction.php");
        die;
    }
    else
    {
        $balance = $_SESSION['balance'];
        $amount = $_SESSION['amount'];
        $account = $_SESSION['account_no'];
        $accnt = $_SESSION['accnt'];
        $updated_sender_balance = $balance - $amount;
        $query6 = "UPDATE bankaccounts SET balance = '".$updated_sender_balance."' WHERE account_no = '".$account."'";
        mysqli_query($con, $query2);
        date_default_timezone_set('Asia/Kolkata');
        $tdate = date("d-m-Y");
        $ttime = date("H:i:s");

            $query8 = "INSERT INTO transactions (from_account_no, to_account_no, amount, tdate, ttime) values('$account','$accnt', '$amount','$tdate','$ttime')";
            mysqli_query($con, $query4);
            header("location: confirmtransaction.php");
            die;
    }

    }
    else
    {

        die(header("location:enterotptransaction.php?transotpFailed"));
    }
    
   }

?>

<?php

if (isset($_GET['transotpFailed'])) {
        $message1 = "No Transaction done! Please enter the correct otp.";
        echo "<script type='text/javascript'>alert('$message1');</script>";
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
	
	<script src="../js/canvas.js"></script>
  <img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="100" height="50">
<map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom1" href="dashboard_page.php">
</map>
<a href="logout_action.php">
      <button type="submit" class="logout">Log Out</button>
    </a>
	<div class="otp" style="padding-top: 20px;">
		<form action="enterotptransaction.php" method="post">
		<label for="otp" style="font-size: 20pt">Enter OTP sent to your registered email:</label><br><br>
		<input type="text" name="otpval" id="otp" onchange="checkotp(otp);" required style="height:20px;"><br><br><br>
		<input type="submit" class="btn1" style="width: 150px; height: 75px;" value="Submit" name="transotp"></form>
</div>
<footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>

</body>
</html>