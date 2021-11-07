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
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body class="body">
		<nav>
	<input id="nav-toggle" type="checkbox">
	
	<ul class="links">
		<li><a href="librarian_view.php">HOME</a></li>
		<li><a href="view_books_added.php">VIEW</a></li>
		<li><a href="add_books_excel.php">UPLOAD</a></li>
		
	
	</ul>
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<br>
<br><br>


		<?php
		if(isset($_POST["buad"]))
		{
			$dtacc=$_POST["datacc"];
			$author=$_POST["baut"];
			$title=$_POST["btit"];
			$pub=$_POST["bpub"];
			$year=$_POST["byear"];
			$nopag=$_POST["bno"];
			$bp=$_POST["bprice"];
			$shelf=$_POST["bshelf"];
			
			$sql="insert into books(subid,dateofacc,author,title,publisher,year,nopages,price,shelfno) values('{$_SESSION['SUBID']}','$dtacc','$author','$title','$pub','$year','$nopag','$bp','$shelf')";
			if($db->query($sql))
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>SUCCESS</span></center>";
				header('Location:view_books_added.php');
				exit;
			}
			else
			{
				echo "<center><span style='padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;top:50px;display:inline-block;color:white;'>FAILED</span></center>";
			}
		}

	
	?>

<center><div class="faculty">
	
	<fieldset class="add_books">
		<legend>ADD BOOK</legend>
	<form action="" method="post">

		DATE OF ACCESSION<input type="date" name="datacc" class="input"><br>
		AUTHOR<input type="text" name="baut" class="input"><br>
		TITLE<br><input type="text" name="btit" class="input"><br>
		PUBLISHER<input type="text" name="bpub" class="input"><br>
		YEAR OF PUBLISHING<input type="text" name="byear" class="input"><br>
		
		NUMBER OF PAGES<input type="text" name="bno" class="input"><br>
		PRICE<br><input type="number" name="bprice" class="input">
		LOCATION<input type="number" name="bshelf" class="input"><br><br>
		<button type="submit" class="bu1" name="buad">ADD BOOK</button>
		
 	</form>
 	</fieldset>
 

</div>
<br><br><br>
</div>
</body>
</html>
