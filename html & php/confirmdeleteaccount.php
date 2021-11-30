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
	<title>Confirm Delete Account</title>
	<link rel="stylesheet" type="text/css" href="../css/base.css">
  <link rel="stylesheet" type="text/css" href="../css/services.css">
</head>
<body>
<canvas></canvas>
      <script type="text/javascript" src="../js/canvas.js"></script>
  <img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="100" height="50">
  <map name="logomap">
  <area shape="rect" coords="0,0,200,80">
</map>
    <div><h1>Your Account has been Deleted</h1>
    	<br>
    	<a href="Welcome_page.php"><button type="Submit" style="height: 100px; width: 200px;">Next</button></a></div>

</body>
</html>
