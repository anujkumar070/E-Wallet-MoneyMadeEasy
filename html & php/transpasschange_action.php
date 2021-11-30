<?php

include("connect.php");
session_start();

if(!isset($_SESSION['username'])){
      header("location: login_page.php");
}

if (isset($_POST['transactionpasschangebtn'])) {
    $old_pass = $_POST['oldtranspass'];
    $new_pass = $_POST['newtranspass'];
    $_SESSION['newtranspass'] = $new_pass;
    $username = $_SESSION['username'];

    $query1 = "SELECT * FROM useraccounts WHERE username = '".$username."'";
    $result1 = mysqli_query($con, $query1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $acc_data = mysqli_fetch_assoc($result1);
        $_SESSION['old_pass'] = $acc_data['transaction_password'];
        

        $rndno=rand(100000, 999999);
        $message = urlencode("otp number.".$rndno);
        $to=$_SESSION['email'];
        $subject = "Your MME OTP";
        $txt = "Your OTP to complete your transaction password change process is:" .$rndno;
        $headers = "From: mme234445@gmail.com";
        mail($to, $subject, $txt, $headers);

        $_SESSION['otp'] = $rndno;
        header("location: enterotptranspasswordchange.php");
        die;

    }
    else
    {
        die(header("location: changepassword_page.php?transpasschangeFailed=true"));
    }
}
  ?>