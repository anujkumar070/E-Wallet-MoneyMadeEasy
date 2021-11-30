<?php    

if (isset($_GET['signupFailed'])) {
        $message1 = "Record not Found in your bank's database.";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }


if (isset($_GET['signupFailed1'])) {
        $message2 = "You already have an account ! Please Log In.";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }

if (isset($_GET['signupFailed2'])) {
        $message2 = "Username already taken please fill a different username.";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }

if (isset($_GET['signupFailed3'])) {
        $message2 = "The account number is not associated with this name in the bank.";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }
if (isset($_GET['signupFailed4'])) {
        $message2 = "The account number is not associated with the selected bank.";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" author="Anuj">
	<title>Sign up page</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
	<script type="text/javascript" src="../js/check.js"></script>
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<link rel="stylesheet" type="text/css" href="../css/base.css">
	<link rel="stylesheet" type="text/css" href="../css/signup_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
</head>
<body>
	<script src="../js/canvas.js"></script>
	<img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="200" height="80">
<map name="logomap">
	<area shape="rect" coords="0,0,200,80" alt="hom" href="home_page.html">
</map>
<a href="login_page.php">
      <button type="submit" class="login">Login</button>
    </a>
    <a href="home_page.html">
      <button type="submit" class="home">Home</button>
    </a>
		
		<h1><i>Welcome to Sign up page<i></h1>
		<div class="signup">
		<table>
		<form action="signup_action.php" method="post">	
		<tr>
		<td><label for="fname">First Name   <font size="2">&#9733</font>
		<td><input type="text" id="fname" name="fname" placeholder="Enter your First Name" size="40" required onchange="CheckName(fname);"></label></tr>
		<tr><td><label for="fname">Last Name<font size="2">&#9733</font> :
		<td><input type="text" id="lname" name="lname" placeholder="Enter your Last Name" size="40" required onchange="CheckName(fname);"></label></tr>

		<tr><td><label for="bank">Bank Name <font size="2">&#9733</font>&nbsp;:&nbsp;
		<td><select name="bank" id="bank" onblur="checkselect1();" required size:"40" style:"width:100px";>
			<option id="bank1" name="default" value="">Select Your Bank Name</option>
			<option value="SBI" id="bank2" name="SBI">State Bank of India</option>
			<option value="ICICI" id="bank3" name="ICICI">ICICI</option>
			<option value="UBI" id="bank4" name="UBI">Union Bank of India</option>
			<option value="CBI" id="bank5" name="CBI">Central Bank of India</option>
			<option value="HDFC" id="bank6" name="HDFC">HDFC Bank</option>
		</select></label></tr><br><br>

		<tr><td><label for="accountno">Account No.<font size="2">&#9733;</font>:
		<td><input type="text" id="accountno" name="accountno" placeholder="Please Enter your Bank Account No." size="40" required onchange="checkbankacc(accountno);"></label><br><br
		></tr>
		<tr><td><label for="username">Username<font size="2">&#9733;</font>:
		<td><input type="text" id="username" name="username" placeholder="Enter a Username of your Choice" size="40"  required onfocus="show(span1);" onblur="document.getElementById('span1').style.display='none';" onchange="CheckUsername(username);"></label><span id="span1">&#9432; Convention: Username should contain only 5 characters which should include atleast one from @,#,$,&</span><br><br>
		</tr>
		<tr><td><label for="pw">Login Password<font size="2">&#9733;</font> :    
		<td><input type="password" id="pw" name="pw" required size="40" placeholder="Enter a Password of your choice" onfocus="show(span2);" onblur="document.getElementById('span2').style.display='none';" onchange="CheckPassword(pw);"></label><span id="span2">&#9432; Convention: Password can vary in length from 8-12 characters which should include atleast one from @,#,$,& , it should also have atleast one uppercase and one lower case letter, it should also have atleast one number</span><br><br>
		</tr>
		<tr><td><label for="cpw"> Confirm Login Password<font size="2">&#9733;</font> : 
		<td><input type="password" id="cpw" name="cpw" required minlength="8" maxlength="15" onkeyup="check(pw,cpw,message);" size="40" placeholder="Confirm your password"><span id='message'></span></label><br><br>
		</tr>
		<tr><td><label for="tpw">Transaction Password<font size="2">&#9733;</font>:    
		<td><input type="password" id="tpw" name="tpw" required size="40" placeholder="Enter a Password of your choice" onfocus="show(span3);" onblur="document.getElementById('span3').style.display='none';" onchange="CheckPassword(tpw);"></label><span id="span3">&#9432; Convention: Password can vary in length from 8-12 characters which should include atleast one from @,#,$,% , it should also have atleast one uppercase and one lower case letter, it should also have atleast one number</span><br><br>
		</tr>
		<tr><td><label for="tcpw">Confirm Transaction Password<font size="2">&#9733;</font> : 
		<td><input type="password" id="tcpw" name="tcpw" required size="40" placeholder="Confirm your Transaction password" onkeyup="check(tpw,tcpw,message1);"><span id='message1'></span></label><br><br>
		</tr>
		<tr><td><label for="contactno">Contact-no<font size="2">&#9733;</font> : </label>
		<td><input type="tel" name="contactno" id="contactno" onchange="checkcontact(contactno)"><br><br>
		</tr>
		<tr><td><label for="email">Email Id<font size="2">&#9733;</font> :
		<td><input type="email" id="email" name="email" placeholder="Enter your Email Id" size="40" required onchange="checkEmail(email);"></label><br><br>
		</tr>
		<tr><td colspan=2><center><font size="2">&#9733; mandatory fields</font><br><br>	</td></tr>
		<tr><td ></td><td><input type="submit" name="signupbtn" class="btn1" value="Submit"></center></form></td></tr> </table></div>
		

</body>
<script>
   function getIp(callback) {
 fetch('https://ipinfo.io/json?token=e8d8fb45a7cc9c', { headers: { 'Accept': 'application/json' }})
   .then((resp) => resp.json())
   .catch(() => {
     return {
       country: 'us',
     };
   })
   .then((resp) => callback(resp.country));
}
   const phoneInputField = document.querySelector("#contactno");
   const phoneInput = window.intlTelInput(phoneInputField, {
   	 initialCountry: "auto",
     geoIpLookup: getIp,
     preferredCountries: ["in","us","uk","ru"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });

   function telephone(){
   	const phoneNumber = phoneInput.getNumber();
   	alert(phoneNumber);
   }
 </script>
</html>