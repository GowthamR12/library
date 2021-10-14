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
	<?php
		if(isset($_POST["return"]))
		{
			$date=date("Y/m/d");
			$id=$_POST["chk"];
			$sqla="update fac_book_issue set ret_stat=1,return_date='$date' where fbid='$id'";
			if($db->query($sqla))
			{
				    echo "fac_book_issue success";
			}
			else
			{
				echo "fac_issue failed";
			}
			$sqlt="select * from fac_book_issue where fbid='$id'";
			$resq=$db->query($sqlt);
			if($resq->num_rows>0)
			{
				$rosq=$resq->fetch_assoc();
				$acc=$rosq["book_acc"];
				$ups="update bookacc set isissued='no' where accno='$acc'";
				if($db->query($ups))
				{
					echo "bookacc success";
				}
				else
				{
					echo "bookacc failed";
				}
			}

		}

	?>
	<center>
			<center><div class="topnav">
			<nav><a href="fac_book_receive.php" >Add Entry</a></nav>
		<nav><a href="fac_book_returned.php">Returned Books</a></nav>
		<nav><a href="index.php"><img src="images/cms.svg" class="img"></a></nav>
	</div>
<div>
	<table>
		<tr>
			<th>Username</th>
			<th>Accession No</th>
			<th>Title</th>
			<th>Issued Date</th>
			<th>Return Date</th>
		</tr>
		<?php
			$sql="select * from fac_book_issue where ret_stat=0";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				while($ro=$res->fetch_assoc())
				{?><form action="" method="post">
		<tr>
			
			<td><?php echo $ro["email"];?></td>
			<td><?php echo $ro["book_acc"];?></td>
			<td><?php echo $ro["book_title"];?></td>
			<td><?php echo $ro["issue_date"];?></td>
			<td><?php echo $ro["return_date"];?></td>
			<td><input type="checkbox" name="chk" value="<?php echo $ro['fbid']; ?>"></td>
			<td><button type="submit" class="button" name="return">Returned</button></td>
		</tr>
	</form>
		<?php
				}
			}
			else
			{
				echo "Empty";
			}
		?>
	</table>
</div>
</center>
</body>
</html>