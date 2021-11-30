<?php
include("connect.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" author="Anuj">
	<title>MME: Money Made Easy</title>
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<link rel="stylesheet" type="text/css" href="../css/welcome_style.css">  <!--link the welcome_style.css file-->
</head> 
<body>
<div >

<script src="../js/canvas.js"></script>                                 <!--use the canvas.js file-->
<img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="600" height="150">
<map name="logomap">                                                  <!--use of imagemap-->
	<area shape="rect" coords="0,0,600,150" alt="hom" href="home_page.html">
</map>
<a href="home_page.html">                                            <!--reffering to home page-->
<button type="submit" class="home">Home</button></a>
<a href="login_page.php">                                             <!--reffering to login page-->
<button type="submit" class="login">Login</button></a>
<a href="signup_page.php">                                             <!--reffering to signup page-->
<button type="submit" class="signup">Sign Up</button></a>

</div>


</body>
</html>