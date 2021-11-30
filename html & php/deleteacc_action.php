<?php
include("connect.php");
session_start();

if (!isset($_SESSION['username'])) {
	header("location: login_page.php");
}

if (isset($_POST['deleteaccbtn'])) {
	$reason = $_POST['reasondelacc'];
	$lmme = $_POST['lmme'];
	$suggestions = $_POST['suggestions'];
	$rndno=rand(100000, 999999);
    $message = urlencode("otp number.".$rndno);
    $to=$_SESSION['email'];
    $subject = "Your MME OTP";
    $txt = "Your OTP to complete your delete account process is:" .$rndno;
        $headers = "From: mme234445@gmail.com";
        mail($to, $subject, $txt, $headers);

        $_SESSION['otp'] = $rndno;
        header("location: enterotpdeleteaccount.php");
        die;
}
else
{
	$rndno=rand(100000, 999999);
    $message = urlencode("otp number.".$rndno);
    $to=$_SESSION['email'];
    $subject = "Your MME OTP";
    $txt = "Your OTP to complete your delete account process is:" .$rndno;
    $headers = "From: mme234445@gmail.com";
    mail($to, $subject, $txt, $headers);

    $_SESSION['otp'] = $rndno;
    header("location: enterotpdeleteaccount.php");
    die;
}
?>