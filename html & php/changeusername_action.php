<?php

include("connect.php");
session_start();

if(!isset($_SESSION['username'])){
      header("location: login_page.php");
}

if (isset($_POST['usernamechangebtn'])) {
    $old_pass = $_POST['oldusername'];
    $new_pass = $_POST['newusername'];

    $query1 = "SELECT * FROM useraccounts WHERE username = '".$old_pass."'";
    $result1 = mysqli_query($con, $query1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $acc_data = mysqli_fetch_assoc($result1);
        $_SESSION['old_pass'] = $acc_data['username'];

        $query2 = "SELECT * FROM useraccounts WHERE username = '".$new_pass."'";
        $result2 = mysqli_query($con, $query2);

        if($result2 && mysqli_num_rows($result2) > 0)
        {
            die(header("location: changeusername_page.php?usernamechangeFailed1=true"));
        }
        else
        {
        $_SESSION['newusername'] = $new_pass; 
        $rndno=rand(100000, 999999);
        $message = urlencode("otp number.".$rndno);
        $to=$_SESSION['email'];
        $subject = "Your MME OTP";
        $txt = "Your OTP to complete your username change process is:" .$rndno;
        $headers = "From: mme234445@gmail.com";
        mail($to, $subject, $txt, $headers);

        $_SESSION['otp'] = $rndno;
        header("location: enterotpusernamechange.php");
        die;}
    }
    else
    {
        die(header("location: changeusername_page.php?usernamechangeFailed=true"));
    }
}

  ?>