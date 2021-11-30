<?php
include("connect.php");
session_start();

if(!isset($_SESSION['username'])){
      header("location: login_page.php");
}

function array_push_assoc($array, $key, $value){
 $array[$key] = $value;
 return $array;
}





  ?>




<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
  <title>Transaction History</title>
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
    <table>
    <a href="dashboard_page.php" id="dashboard">Dashboard</a>
      <a href="transaction_page.php" id="trans">Transaction</a>
      <a class="active" href="transactionhistory_page.php" id="transhis">Transaction History</a>
    <a href="checkbalancepage.php" id="bal">Check Balance</a>
    <a href="deleteacc_page.php" id="del">Delete Account</a>
    <a href="contactpage.php" id="contact">Contact</a>
</table>
</div>
<div>
            <h1 id="Header">Transaction History</h1>
            <form action="transactionhistory_page.php" method="post">
            <b><font style="font-size: 15px;">Day:</font></b><select name="filter1" id="filter1" style="width: 120px; height: 30px;">
              <option selected="selected" name="time" value="All">All</option>
              <option value="Today" name="time">Today</option>
              <option value="Last 7 Days" name="time">Last 7 Days</option>
              <option value="Last 30 Days" name="time">Last 30 Days</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b><font style="font-size: 15px;">
            <input type="submit" name="filter" value="Apply Filter" class="btn1" style="width:200px;"></form><br><br>             
            <center>
            <table border="2" style="border-color: white;">
              <tr>
                <th>Benefactor Account No. </th>
                <th>Beneficiary Account No.</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Time</th>
                <th>Transaction Type</th>
              </tr>
              <?php
              if (isset($_POST['filter'])) {
                $filter = $_POST['filter1'];
                switch ($filter) {
                  case 'All':
                  $account = $_SESSION['account_no'];
                  $query1 = "SELECT * FROM transactions WHERE from_account_no = '".$account."' OR to_account_no = '".$account."'";
                  $result1 = mysqli_query($con, $query1);
                    while($res=mysqli_fetch_assoc($result1))
                    {
                      if ($res['from_account_no'] === $account) {
                        $res = array_push_assoc($res, 't_type', 'Debit');
                    }
                    else
                    {
                      $res = array_push_assoc($res, 't_type', 'Credit');
                    }
                echo '<tr>';
                echo '<td>'.$res['from_account_no'].'</td>';
                echo '<td>'.$res['to_account_no'].'</td>';
                echo '<td>'.$res['amount'].'</td>';
                echo '<td>'.$res['tdate'].'</td>';
                echo '<td>'.$res['ttime'].'</td>';
                echo '<td>'.$res['t_type'].'</td>';
                echo '</tr>';}
                    break;

                  case 'Today':
                  $account = $_SESSION['account_no'];
                  $query1 = "SELECT * FROM transactions WHERE from_account_no = '".$account."' OR to_account_no = '".$account."'";
                  $result1 = mysqli_query($con, $query1);
                  if($result1 && mysqli_num_rows($result1) > 0)
                  {
                  date_default_timezone_set('Asia/Kolkata');
                  $d1 = date('Y-m-d');
                  $query2 = "SELECT * FROM transactions WHERE tdate = STR_TO_DATE('".$d1."','%Y-%m-%d')";
                  $result2= mysqli_query($con, $query2);
                  while($res = mysqli_fetch_assoc($result2))
                  {
                   if ($res['from_account_no'] === $account) {
                        $res = array_push_assoc($res, 't_type', 'Debit');
                    }
                    else
                    {
                      $res = array_push_assoc($res, 't_type', 'Credit');
                    }
                echo '<tr>';
                echo '<td>'.$res['from_account_no'].'</td>';
                echo '<td>'.$res['to_account_no'].'</td>';
                echo '<td>'.$res['amount'].'</td>';
                echo '<td>'.$res['tdate'].'</td>';
                echo '<td>'.$res['ttime'].'</td>';
                echo '<td>'.$res['t_type'].'</td>';
                echo '</tr>';
              }}
                break;

                case 'Last 7 Days':
                 $account = $_SESSION['account_no'];

                  $query1 = "SELECT * FROM transactions WHERE from_account_no = '".$account."' OR to_account_no = '".$account."'";
                  $result1 = mysqli_query($con, $query1);
                  if($result1 && mysqli_num_rows($result1) > 0)
                  {
                  date_default_timezone_set('Asia/Kolkata');
                  $d1 = date('Y-m-d');
                  $lastWeek = time() - (7 * 24 * 60 * 60);
                  $d2 = date('Y-m-d', $lastWeek);
                  $query2 = "SELECT * FROM transactions where tdate BETWEEN STR_TO_DATE('".$d2."', '%Y-%m-%d') AND STR_TO_DATE('".$d1."', '%Y-%m-%d')";
                  $result2 = mysqli_query($con, $query2);
                  while($res = mysqli_fetch_assoc($result2))
                  {
                   if ($res['from_account_no'] === $account) {
                        $res = array_push_assoc($res, 't_type', 'Debit');
                    }
                    else
                    {
                      $res = array_push_assoc($res, 't_type', 'Credit');
                    }
                echo '<tr>';
                echo '<td>'.$res['from_account_no'].'</td>';
                echo '<td>'.$res['to_account_no'].'</td>';
                echo '<td>'.$res['amount'].'</td>';
                echo '<td>'.$res['tdate'].'</td>';
                echo '<td>'.$res['ttime'].'</td>';
                echo '<td>'.$res['t_type'].'</td>';
                echo '</tr>';
              }}
                  break;

                  case 'Last 30 Days':
                  $account = $_SESSION['account_no'];
                   date_default_timezone_set('Asia/Kolkata');
                  $d1 = date('Y-m-d');
                  $lastMonth = time() - (30 * 7 * 24 * 60 * 60);
                  $d2 = date('Y-m-d', $lastMonth);

                  $query1 = "SELECT * FROM transactions WHERE from_account_no = '".$account."' OR to_account_no = '".$account."'";
                  $result1 = mysqli_query($con, $query1);
                  if($result1 && mysqli_num_rows($result1) > 0)
                  {
                  date_default_timezone_set('Asia/Kolkata');
                  $d1 = date('Y-m-d');
                  $lastMonth = time() - (30 * 24 * 60 * 60);
                  $d2 = date('Y-m-d', $lastMonth);
                  $query2 = "SELECT * FROM transactions where tdate BETWEEN STR_TO_DATE('".$d2."', '%Y-%m-%d') AND STR_TO_DATE('".$d1."', '%Y-%m-%d')";
                  $result2 = mysqli_query($con, $query2);
                  while($res = mysqli_fetch_assoc($result2))
                  {
                   if ($res['from_account_no'] === $account) {
                        $res = array_push_assoc($res, 't_type', 'Debit');
                    }
                    else
                    {
                      $res = array_push_assoc($res, 't_type', 'Credit');
                    }
                echo '<tr>';
                echo '<td>'.$res['from_account_no'].'</td>';
                echo '<td>'.$res['to_account_no'].'</td>';
                echo '<td>'.$res['amount'].'</td>';
                echo '<td>'.$res['tdate'].'</td>';
                echo '<td>'.$res['ttime'].'</td>';
                echo '<td>'.$res['t_type'].'</td>';
                echo '</tr>';
              }}
                    break;

                
              }
            }
            else
            {
              $account = $_SESSION['account_no'];
                  $query1 = "SELECT * FROM transactions WHERE from_account_no = '".$account."' OR to_account_no = '".$account."'";
                  $result1 = mysqli_query($con, $query1);
                    while($res=mysqli_fetch_assoc($result1))
                    {
                      if ($res['from_account_no'] === $account) {
                        $res = array_push_assoc($res, 't_type', 'Debit');
                    }
                    else
                    {
                      $res = array_push_assoc($res, 't_type', 'Credit');
                    }
                echo '<tr>';
                echo '<td>'.$res['from_account_no'].'</td>';
                echo '<td>'.$res['to_account_no'].'</td>';
                echo '<td>'.$res['amount'].'</td>';
                echo '<td>'.$res['tdate'].'</td>';
                echo '<td>'.$res['ttime'].'</td>';
                echo '<td>'.$res['t_type'].'</td>';
                echo '</tr>';}

            }

              ?>
            </table>
          </center>
          </div>
          <footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>

</body>
</html>