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
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta charset="utf-8">
	<title></title>
</head>
<body class="body">
	<a href="librarian_view.php"><button class="button">HOME</button></a>
	<a href="faculty_det.php"><button class="button">BACK</button></a>

	<?php

	if(isset($_POST["del"]))
	{
		$sq="delete from faculty where email='{$_SESSION['EMAIL']}'";
		if($db->query($sq))
		{
			header('location:faculty_det.php');
		}
		else
		{
			echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>Can't Delete</span></center>";	
		}
	}

	?>
	<center><div >
		<table>
						<table>
			<tr>
				<th>No</th>
				<th>ACCESSION NUMBER</th>
				<th>RETURNED</th>
			</tr>
	<?php
		$sql="select * from fac_book_issue where email='{$_SESSION['EMAIL']}'";
		$res=$db->query($sql);
		$i=1;
		if($res->num_rows>0)
		{
			while($ro=$res->fetch_assoc())
			{?>
						<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $ro["book_acc"]; ?></td>
				<td>
					<?php 
						if($ro["ret_stat"]==1)
						{
							echo "Returned";
						}
						else
						{
							echo "Issued";
						}
					?>
			</tr>

			<?php $i++;
			}

		}

	?>
		<div style="margin-left:1000px;margin-top:50px">
			<form action="" method="post">
				<button type="submit" name="del" class="button"><span>DELETE FACULTY</span></button>
			</form>
		</div>

</div>

</body>
</html>