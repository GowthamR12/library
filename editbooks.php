<?php 
include "database.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body class="body">
<br>
<br><br>
<a href="librarian_view.php"><button class="button">HOME</button></a>


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
			
			$sql="update books set dateofacc='$dtacc',author='$author',title='$title',publisher='$pub',year='$year',nopages='$nopag',price='$bp',shelfno='$shelf' where bid='{$_SESSION['BKID']}'";
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
		<?php
		 $sqb="select * from books where bid='{$_SESSION['BKID']}'";
		 $reb=$db->query($sqb);
		 if($reb->num_rows>0)
		 {
		 	$rob=$reb->fetch_assoc();?>

		<form action="" method="post">


		DATE OF ACCESSION<input type="date" name="datacc" value="<?php echo $rob['dateofacc'];?>" class="input"><br>
		AUTHOR<input type="text" name="baut" value="<?php echo $rob['author'];?>" class="input"><br>
		TITLE<br><input type="text" name="btit" value="<?php echo $rob['title'];?>" class="input"><br>
		PUBLISHER<input type="text" name="bpub" value="<?php echo $rob['publisher'];?>" class="input"><br>
		YEAR OF PUBLISHING<input type="text" name="byear" value="<?php echo $rob['year'];?>" class="input"><br>
		
		NUMBER OF PAGES<input type="text" name="bno" value="<?php echo $rob['nopages'];?>" class="input"><br>
		PRICE<br><input type="text" name="bprice" value="<?php echo $rob['price'];?>" class="input">
		LOCATION<input type="text" name="bshelf" value="<?php echo $rob['shelfno'];?>" class="input"><br><br>
		<button type="submit" class="bu1" value="<?php echo $rob['dateofacc'];?>" name="buad">UPDATE</button>
		
 	</form>
 	</fieldset>
 	<?php
 }
 ?>
</body>
</html>