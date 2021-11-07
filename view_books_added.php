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
	<title></title>
</head>
<body class="body">

			<nav>
	<input id="nav-toggle" type="checkbox">
	
	<ul class="links">
		<li><a href="librarian_view.php">HOME</a></li>
		<li><a href="add_acc_excel.php">UPLOAD ACCESSION NUMBER</a></li>
	
	</ul>
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<br>
<br>
<center>

		<?php
		if(isset($_POST["acbu"]))
			{
				$_SESSION["BID"]=$_POST["chk"];
				$sqla="select * from bookacc";
				if($db->query($sqla))
				{
					header('Location:add_acc_no.php');
					
				}
				else
				{
					echo "wrong";
				}
				

			}

		else if(isset($_POST["buedit"]))
		{
			$_SESSION["BKID"]=$_POST["chk"];
			header('location:editbooks.php');
		}
		?>


	<div style="position: relative;top:50px">
		<br>
		<br>
		<table>
			<tr>
				<th>Index</th>
				<th>Date Of Accession</th>
				<th>Author</th>
				<th>Title</th>
				<th>Publisher</th>
				<th>Year</th>
				<th>No of Pages</th>
				<th>Price</th>	
				<th>Location</th>
				
			</tr>
			<?php
				$sq="select * from books where subid='{$_SESSION['SUBID']}'";
				$re=$db->query($sq);
				if($re->num_rows>0)
				{	$i=1;
					while($ro=$re->fetch_assoc())
					{?>
					<form action="" method="post"> 

					<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $ro["dateofacc"];?></td>
					<td><?php echo $ro["author"];?></td>
					<td><?php echo $ro["title"];?></td>
					<td><?php echo $ro["publisher"];?></td>
					<td><?php echo $ro["year"];?></td>
					<td><?php echo $ro["nopages"];?></td>
					<td><?php echo $ro["price"];?></td>
					<td><?php echo $ro["shelfno"];?></td>
					<input type="hidden" name="chk" value="<?php echo $ro['bid'];?>">
					<td><button type="submit" class="button" name="acbu" style="width:250px">ADD ACCESSION NO</button></td>
					<td><button type="submit" class="bu1" name="buedit">EDIT</button></td>
	
		</tr>
	</form>
	<?php $i++;

					}
				}
				else
				{
					echo "EMPTY";
				}
			?>

		</table>

</body>
</html>