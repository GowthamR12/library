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
				    echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>RETURNED SUCCESSIVELY</span></center>";
			}
			else
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>FAILED TO RETURN</span></center>";
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
				}
				else
				{
				}
			}

		}

	?>
	<center>
		<nav>
	<input id="nav-toggle" type="checkbox">
	
	<ul class="links">
		<li><a href="fac_report_set.php">REPORT</a></li>
		<li><a href="fac_book_receive.php" >ADD ISSUING DETAILS</a></li>
		<li><a href="librarian_view.php">HOME</a></li>
	
	</ul>
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
			
	<br>
	<br><br><br>
	<br>
		<br>
		<br>
		<br>
	<br><br>
		<?php
			$sql="select * from fac_book_issue where ret_stat=0";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{?>
					<table>
		<tr>
			<th>Username</th>
			<th>Accession No</th>
			<th>Title</th>
			<th>Issued Date</th>
			<th>FINAL RETURN DATE</th>
		</tr>

				<?php
				while($ro=$res->fetch_assoc())
				{?><form action="" method="post">
		<tr>
			
			<td><?php echo $ro["facname"];?></td>
			<td><?php echo $ro["book_acc"];?></td>
			<td><?php echo $ro["book_title"];?></td>
			<td><?php echo $ro["issue_date"];?></td>
			<td><?php echo $ro["actual"];?></td>
			<input type="hidden" name="chk" value="<?php echo $ro['fbid']; ?>">
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