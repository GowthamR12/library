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
		<li><a href="view_subjects_added.php">VIEW SUBJECTS</a></li>
		<li><a href="add_sub_excel.php">UPLOAD</a>a></li>
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
			$sub=$_POST["sub"];
			
			$sql="insert into subject(subject) values('$sub')";
			if($db->query($sql))
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>SUCCESS</span></center>";
				header('Location:view_subjects_added.php');
				exit;
			}
			else
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>FAILED</span></center>";
			}
		}
	?>

<center><div class="faculty">
	
	<fieldset class="add_books">
		<legend>ADD SUBJECT</legend>
	<form action="" method="post">

		NAME OF THE SUBJECT<input type="text" name="sub" class="input"><br>
		<button type="submit" class="bu1" name="buad">ADD BOOK</button>
 	</form>
 	</fieldset>
 

</div>
<br><br><br>
</div>
</body>
</html>
