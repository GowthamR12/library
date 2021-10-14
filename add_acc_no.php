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
	<link rel="stylesheet" href="style.css">
	<title></title>
</head>
<body class="body">
	<?php
		if(isset($_POST["deleteall"]))
		{
			$sqla="select * from books where bid='{$_SESSION['BID']}'";
			$res=$db->query($sqla);
			if($res->num_rows>0)
			{
				$q="delete from books where bid='{$_SESSION['BID']}'";
				$db->query($q);
				header('Location:add_books.php');

			}
			else
			{
				echo "<center><span style='padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>NO ENTRY</span></center>";
				header('Location:add_books.php');
			}
		}
	?>
	<?php

		/*accepting adding of accession number from form*/

		if(isset($_POST["add"]))
		{	//making understand the html input received (accession no,volume) as php language*/

			$accno=$_POST["acc"];
			$volume=$_POST["bvol"];

			$bfid=$_SESSION["BID"];

			/*insert those $accno and $volume into bookacc table located in database*/



			$sql="insert into bookacc(accno,bfid,volume) values('$accno','$bfid','$volume')";

			/*the above sql query executes properly, below if condition becomes true*/
			if($db->query($sql))
			{
				header('Location:add_books.php');
			}
			else
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>FAILED</span></center>";
			}
		}
	?>
	<?php
		if(isset($_POST['delete']))
		{
			$sq="select * from bookacc where bcid='{$_POST['chk']}'";
			$res=$db->query($sq);
			if($res->num_rows>0)
			{
				$qt="delete from bookacc where bcid='{$_POST['chk']}'";
				$db->query($qt);

			}
			else
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>NO ENTRY</span></center>";
			}
		}
	?>
	<center>
		
	<div >
		<table >
			<tr>
				<th>SI</th>
				<th>ACCESSION NUMBER</th>
				<th>ISISSUED</th>
				<th>VOLUME</th>

			</tr>
			<?php
				$sq="select * from bookacc where bfid='{$_SESSION["BID"]}'";
				$re=$db->query($sq);
				if($re->num_rows>0)
				{
					$i=0;
					while($ro=$re->fetch_assoc())
					{?>
					<form action="" method="post">
					<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $ro["accno"];?></td>
				<td><?php echo $ro["isissued"];?></td>
				<td><?php echo $ro["volume"];?></td>
				<td><input type="checkbox" name="chk" value="<?php echo $ro['bcid'];?>"></td>
				<td><button type="submit" class="button" name="delete">DELETE</button></td>
				</tr>
			</form>
			<?php 
				$i++;

					}
				}
				else
				{
					echo "EMPTY";
				}
			?>

			
			</table>

	</div>

	
	<div style="background-color: black;position: relative;top:50px">
	<form action="" method="post" >
		<font color="white">ENTER ACCESSION_NO<input type="text" name="acc" class="input">
			<font color="white">VOLUME<input type="number" name="bvol" class="input">
		<button type="submit" class="button" name="add">ADD</button>
	</form>
</div>
<div style="display:inline-block;position: relative;right: -500px;top:-70px">
	<form action="" method="post">
	<button type="submit" class="button" name="deleteall" style="width:250px">DELETE ENTIRE BOOK</button>
</form>
</div>

</body>
</html>