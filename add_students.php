<?php
include "database.php";
session_start();
	if(!isset($_SESSION["ID"]))
	{
		header('location:index.php?reg=Access Denied..');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<title></title>
</head>
<body class="body">
	<a href="librarian_view.php"><button class="button">HOME</button></a>
<center><form action="#" method="POST" enctype="multipart/form-data">
	<div class="file-input report">
  <input type="file" name="excel" required="required">
 

	<button type="submit" name="submit" class="button">Submit</button>
</div>
</form>
<?php
if(isset($_POST["submit"]))
{
	$date=date("Y/m/d");
	$act = date('Y/m/d',strtotime($date . "+1095 days"));

$uploadfile=$_FILES['excel']['tmp_name'];

require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$objExcel=PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow=$worksheet->getHighestRow();

	for($row=1;$row<=$highestrow;$row++)
	{
		$name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		$uprn=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		$email=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
		$phone=$worksheet->getCellByColumnAndRow(3,$row)->getvalue();
		$pass=$worksheet->getCellByColumnAndRow(4,$row)->getvalue();
		$grad=$worksheet->getCellByColumnAndRow(5,$row)->getvalue();

			if($grad=='ug')
			{
				$insertqry="INSERT INTO student(username,uprn,email,phoneno,password,role,crtdate,exprydate) VALUES ('$name','$uprn','$email','$phone','$pass','$grad','$date','$act')";
				if($db->query($insertqry))
				{
					$et=$row;
				}
				else
				{
					echo "<p style='color:white;font-size:30px'>".$row."cant insert values<br></p>";
				}
			}
			else if($grad=='pg')
			{
				$actu = date('Y/m/d',strtotime($date . "+730 days"));
				$insertqry="INSERT INTO student(username,uprn,email,phoneno,password,role,crtdate,exprydate) VALUES ('$name','$uprn','$email','$phone','$pass','$grad','$date','$actu')";
				if($db->query($insertqry))
				{
					$et=$row;
				}
				else
				{
					echo "<p style='color:white;font-size:30px'>".$row."cant insert values<br></p>";
				}
			}
	}
	echo "<div style='position:relative;top:200px;'><p style='color:white'>".$et."- RECORDS UPDATED</p>";
}
}
?>
</body>
</html>