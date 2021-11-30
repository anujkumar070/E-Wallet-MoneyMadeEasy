<?php  

include("connect.php");

/* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

if(isset($_POST['signupbtn']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $fname.' '.$lname;
    $bank = $_POST['bank'];
    $username = $_POST['username'];
    $pw = $_POST['pw'];
    $tpw = $_POST['tpw'];
    $phone = $_POST['contactno'];
    $Email = $_POST['email'];
    $account = $_POST['accountno'];

    $query1 = "SELECT * FROM useraccounts WHERE account_no='".$account."'";
    $result1 = mysqli_query($con, $query1);
    if ($result1 && mysqli_num_rows($result1) >0)
    {
        session_destroy();
        die(header("location:signup_page.php?signupFailed1=true"));
    }
    else
    {
    $query2 = "SELECT * FROM useraccounts WHERE username = '".$username."'";

    $result2 = mysqli_query($con, $query2);

    if($result2 && mysqli_num_rows($result2) >0)
    {
    	session_destroy();
        die(header("location:signup_page.php?signupFailed2=true"));
    }
    else
    {
        $query3 = "SELECT * FROM bankaccounts WHERE account_no = '".$account."'";
        $result3 = mysqli_query($con, $query3);

        if($result3 && mysqli_num_rows($result3) > 0)
        {
            $bank_data = mysqli_fetch_assoc($result3);
            if($bank_data['bank'] === $bank)
            {
                if($bank_data['name_of_user'] === $name)
                {
           $query4 = "INSERT INTO useraccounts (account_no, contact_no, username, login_password, transaction_password, email) values ('$account', '$phone','$username','$pw','$tpw','$Email')";

        mysqli_query($con, $query4);

        header("location: confirmsignup.php");
        die;
        }
        else
        {
    	 session_destroy();
        die(header("location:signup_page.php?signupFailed3=true"));
        }
    }
    else
    {
       session_destroy();
       die(header("location:signup_page.php?signupFailed4=true")); 
    }
}
}

}
}

?>