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
  <input type="file" name="excel">
 

	<button type="submit" name="submit" class="button">Submit</button>
</div>
</form>
<?php
if(isset($_POST["submit"]))
{
	$date=date("Y/m/d");

$uploadfile=$_FILES['excel']['tmp_name'];

require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$objExcel=PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow=$worksheet->getHighestRow();

	for($row=1;$row<=$highestrow;$row++)
	{
		$au=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		$tit=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		$pub=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
		$yr=$worksheet->getCellByColumnAndRow(3,$row)->getvalue();
		$no=$worksheet->getCellByColumnAndRow(4,$row)->getvalue();
		$price=$worksheet->getCellByColumnAndRow(5,$row)->getvalue();
				

				$insertqry="INSERT INTO books(dateofacc,subid,author,title,publisher,year,nopages,price) VALUES('$date','{$_SESSION['SUBID']}','$au','$tit','$pub','$yr','$no','$price')";
				if($db->query($insertqry))
				{
					$et=$row;
				}
				else
				{
					echo "<p style='color:white;font-size:30px'>".$row."cant insert values<br></p>";
				}
	}
	echo "<div style='position:relative;top:200px;'><p style='color:white;font-size:50px'>".$et."- RECORDS UPDATED</p>";
}
}
?>
</body>
</html>