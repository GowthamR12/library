<?php
include "database.php";
require('vendor/autoload.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="viewpot" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body class="body">
	<a href="librarian_view.php"><button class="button">HOME</button></a>
	<center><div class="report">
	<form action="stud_report.php" target="_blank" method="post">
		<h1>GENERATE REPORT</h1>
		<label><b><font size="4px">FROM<br></label><input type="date" name="from" required="required"><br><br>
		<label>UPTO</label><br><input type="date" name="to" required="required" ><br><br>
		<button type="submit" class="button" name="create">CREATE PDF</button>

	</form>
</div>



</body>
</html>