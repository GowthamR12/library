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

<center><div class="faculty">
	
	<fieldset class="add_books">
		<legend>ADD BOOK</legend>
		<?php
		 $sqb="select * from subject where subid='{$_SESSION['SID']}'";
		 $reb=$db->query($sqb);
		 if($reb->num_rows>0)
		 {
		 	$rob=$reb->fetch_assoc();?>

		<form action="" method="post">


	
		AUTHOR<input type="text" name="subject" value="<?php echo $rob['subject'];?>" class="input"><br>
	
		<button type="submit" class="bu1" value="<?php echo $rob['subid'];?>" name="buad">UPDATE</button>
		<button type="submit" class="bu1" value="<?php echo $rob['subid'];?>" name="budel">DELETE</button>

		
 	</form>
 	</fieldset>
 	<?php
 }
 ?>
 </div>
</center>


	<?php
		if(isset($_POST["buad"]))
		{
			$sub=$_POST["subject"];
			
			$sql="update subject set subject='$sub' where subid='{$_SESSION['SID']}'";
			if($db->query($sql))
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>SUCCESS</span></center>";
				header('Location:view_subjects_added.php');
				exit;
			}
			else
			{
				echo "<center><span style='padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;top:50px;display:inline-block;color:white;'>FAILED</span></center>";
			}
		}

		else if(isset($_POST["budel"]))
		{
			$sqla="select * from subject where subid='{$_SESSION['SID']}'";
			$res=$db->query($sqla);
			if($res->num_rows>0)
			{
				$q="delete from subject where subid='{$_SESSION['SID']}'";
				$resdel=$db->query($q);
				//if($resdel->num_rows>0){
					header('Location:view_subjects_added.php');
					echo $_SESSION['SID'];
				//}
			}
			else
			{
				echo "<center><span style='padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>NO ENTRY</span></center>";
			
			}
		}

	
	?>

</body>
</html>