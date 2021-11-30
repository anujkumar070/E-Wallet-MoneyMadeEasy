<?php
include("connect.php");
session_start();

if(!isset($_SESSION['username'])){
      header("location: login_page.php");
}




if (isset($_GET['usernamechangeFailed'])) {
        $message = "Fill the correct old username";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

if (isset($_GET['usernamechangeFailed1'])) {
        $message = "The new username filled by you is already in use, please fill a different username.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

?>




<!DOCTYPE html>
<html>
<head>
	<title>Change Username</title>
	<link rel="stylesheet" type="text/css" href="../css/base.css">
	<link rel="stylesheet" type="text/css" href="../css/services.css">
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<script type="text/javascript" src="../js/check.js"></script>
</head>
<body>
	
	<script src="../js/canvas.js"></script>
  <img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="100" height="50">
<map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom1" href="dashboard_page.php">
</map>
<a href="confirmlogout.php">
      <button type="submit" class="logout">Log Out</button>
    </a>
	
	<div class="changeusername">
		<h1>Change Username</h1>
		<form action="changeusername_action.php" method="post">
			<dl><dt><label for="oldusername">Enter Old Username <font size="2">&#9733;</font> :&nbsp;
			<input type="text" name="oldusername" id="oldusername"></label><br><br></dt>
			<dt><label for="newusername">Enter New Username <font size="2">&#9733;</font> :&nbsp;
			<input type="text" name="newusername" id="newusername" onchange="CheckUsername1(newusername)"></label><br><br></dt>
			<dt><label for="renewusername">Confirm New Username <font size="2">&#9733;</font> :&nbsp;
			<input type="text" name="renewusername" id="renewusername" onkeyup="check(newusername,renewusername,message)" onfocus="hide(newusername);" onblur="show1(newusername);"><span id="message"></span></label></dt><br><br>
			<font size="2">&#9733; mandatory fiels</font><br><br><dl>
	<input type="submit" name="usernamechangebtn" value="Submit" class="btn1"></form>
	</div>

<footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>

</body>
</html>