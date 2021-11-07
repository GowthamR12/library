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
<center>

		<?php
		if(isset($_POST["acbu"]))
			{
				$_SESSION["SUBID"]=$_POST["chk"];
				header('Location:add_books.php');

			}
		?>


	<div style="position: relative;top:50px">
		<br>
		<br>
		<table>
			<tr>
				<th>Index</th>
				<th>Subject</th>
				
				
			</tr>
			<?php
				$sq="select * from subject";
				$re=$db->query($sq);
				if($re->num_rows>0)
				{	$i=1;
					while($ro=$re->fetch_assoc())
					{?>
					<form action="" method="post"> 

					<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $ro["subject"];?></td>
			
					<input type="hidden" name="chk" value="<?php echo $ro['subid'];?>">
					<td><button type="submit" class="button" name="acbu" style="width:250px">ADD BOOKS</button></td>
	
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