<?php
 include ("connect.php");

 /* Avoid multiple sessions warning
   Check if session is set before starting a new one. */
   if(!isset($_SESSION['username']))
   {
      session_start();
   }

    if(isset($_POST['loginbtn']))
    {
    	$username = $_POST['username'];
    	$pw = $_POST['pw'];
    	$query = "SELECT * FROM useraccounts WHERE username ='".$username."'";
    	$result = mysqli_query($con, $query);

    	if ($result && mysqli_num_rows($result) > 0) 
      {
    		$user_data = mysqli_fetch_assoc($result);

         
         if($user_data['login_password'] === $pw)
         {
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['account_no'] = $user_data['account_no'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['login_password'] = $user_data['login_password'];
            $_SESSION['transaction_password'] = $user_data['transaction_password'];
            header("location: dashboard_page.php");
            die;
         }
    		 else
      {
         die(header("location: login_page.php?loginFailed2=true"));
      }
    	}
      else
      {
         die(header("location: login_page.php?loginFailed1=true"));
      }
    	
    }
?>