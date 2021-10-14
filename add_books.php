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
		?>

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
			
			$sql="insert into books(dateofacc,author,title,publisher,year,nopages,price,shelfno) values('$dtacc','$author','$title','$pub','$year','$nopag','$bp','$shelf')";
			if($db->query($sql))
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>SUCCESS</span></center>";
				header('Location:librarian_view.php');
				exit;
			}
			else
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>FAILED</span></center>";
			}
		}
	?>


<center><div class="fac">
	
	<fieldset class="add_books">
		<legend>ADD BOOK</legend>
	<form action="" method="post">

		DATE OF ACCESSION<input type="date" name="datacc" class="input"><br>
		AUTHOR<input type="text" name="baut" class="input">
		TITLE<input type="text" name="btit" class="input">
		PUBLISHER<input type="text" name="bpub" class="input">
		YEAR OF PUBLISHING<input type="text" name="byear" class="input">
		
		NUMBER OF PAGES<input type="text" name="bno" class="input">
		PRICE<input type="number" name="bprice" class="input">
		LOCATION<input type="number" name="bshelf" class="input"><br><br>
		<button type="submit" class="bu1" name="buad">ADD BOOK</button>
 	</form>
 	</fieldset>
 

</div>

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
				$sq="select * from books";
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
					<td><input type="checkbox" name="chk" value="<?php echo $ro['bid'];?>">
					<td><button type="submit" class="button" name="acbu" style="width:250px">ADD ACCESSION NO</button></td>
	
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




</div>
</body>
</html>
