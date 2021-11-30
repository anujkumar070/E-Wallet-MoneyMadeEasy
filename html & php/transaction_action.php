<?php


include ("connect.php");


 session_start();

if(!isset($_SESSION['username'])){
      header("location: login_page.php");
}
$account = $_SESSION['account_no'];
$query1 = "SELECT * FROM bankaccounts WHERE account_no = '".$account."'";
  $result1 = mysqli_query($con, $query1);
  if($result1 && mysqli_num_rows($result1) > 0)
  {
    $acc_data = mysqli_fetch_assoc($result1);
    $balance = $acc_data['balance'];
  }
if (isset($_POST['transbtn'])) {
  $account = $_SESSION['account_no'];
  $accnt = $_POST['pacno'];
  $amount = $_POST['amount'];
  $password = $_POST['pw'];


  if ($password === $_SESSION['transaction_password']) {
    $_SESSION['accnt'] = $accnt;
    $_SESSION['amount'] = $amount;
    $query = "SELECT * FROM bankaccounts WHERE account_no = '".$account."'";
    $result = mysqli_query($con, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
      $acc_data = mysqli_fetch_assoc($result);
      $balance = $acc_data['balance'];

      if($balance < $_SESSION['amount'])
      {
        die(header("location:transaction_page.php?transFailed1=true"));
      }
      else
      {
        $_SESSION['balance'] = $balance; 
        $rndno=rand(100000, 999999);
        $message = urlencode("otp number.".$rndno);
        $to=$_SESSION['email'];
        $subject = "Your MoneyMadeEasy OTP ";
        $txt = "Your OTP to complete your transaction is:" .$rndno ."\n  Developed by Anuj & Burhanuddin";
        $headers = "From: your email id";
        mail($to, $subject, $txt, $headers);


        $_SESSION['otp'] = $rndno;
        header("location:enterotptransaction.php");
        die;
     }
   }
  }
  else
  {
    die(header("location:transaction_page.php?transFailed2=true"));
  }
}



?>
