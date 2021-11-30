<?php
include("connect.php");
session_start();
session_destroy(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<title>Confirm Log Out</title>
	<link rel="stylesheet" type="text/css" href="../css/base.css">
  <link rel="stylesheet" type="text/css" href="../css/services.css">
</head>
<body>

      <script type="text/javascript" src="../js/canvas.js"></script>
  <img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="100" height="50">
  <map name="logomap">
  <area shape="rect" coords="0,0,200,80">
</map>
    <div><h1>You have Logged Out Successfully</h1>
    	<br>
    	<a href="Welcome_page.php"><button type="Submit" style="height: 100px; width: 200px;">Next</button></a></div>
<footer> &copy 2021 - Developed by Anuj & Burhanuddin</footer>

</body>
</html>
