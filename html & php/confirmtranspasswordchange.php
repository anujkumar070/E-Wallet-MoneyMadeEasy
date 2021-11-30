<?php
include("connect.php");
session_start();
if(!isset($_SESSION['username']))
{
      header("location: login_page.php");
} ?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<title>Confirm Transaction Password Change</title>
	<link rel="stylesheet" type="text/css" href="../css/base.css">
  <link rel="stylesheet" type="text/css" href="../css/services.css">
</head>
<body>
<canvas></canvas>
      <script type="text/javascript" src="../js/canvas.js"></script>
  <img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="100" height="50">
  <map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom1" href="dashboard_page.html">
</map>
<a href="confirmlogout.html">
	<button type="submit" class="logout">Log Out</button>
    </a>
    <div><h1>Your Transaction Password has been changed</h1>
    	<br>
    	<a href="dashboard_page.php"><button type="Submit" style="height: 100px; width: 200px;">Go to Dashboard</button></a></div>

</body>
</html>
