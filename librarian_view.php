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

	<div class="topnav">
	<div class="topnav dis">
		<nav ><a href="logout.php"><button class="button" style="position: relative;top:-5px">LOG OUT</button></a></nav>
	<nav><a href="faculty_det.php">FACULTY DETAILS</a></nav>
	<nav><a href="stud_det.php">STUDENT DETAILS</a></nav>
	<nav><a href="add_books.php">ADD BOOKS</a></nav>
	<nav><a href="add_students.php">ADD STUDENTS</a></nav>
	<nav><a href="stud_book_issue.php">ISSUE STUDENTS</a></nav>
	<nav><a href="fac_book_issue.php">ISSUE FACULLTIES</a></nav>
	<nav><a href="index.php"><img src="images/cms.svg" class="img"></a></nav>
</div>
</div>

	<center><div >
	<form action="" method="post">
		<br><select class="select">
			<option name="accno">ACCESSION NO</option>
			<option name="author">AUTHOR</osption>
			<option name="title">TITLE</option>
		</select>
		<input type="text" class="input" name="se" placeholder="Search Here..." size="125">
		<button type="submit" class="button" name="butse">SEARCH</button>
	
	</form>
	<form action="" method="post">
		<br>
		<br>
		<button type="submit" class="button" name="viewse" style="position: relative;left:700px;bottom:70px">VIEW ALL</button>
	</form>
	<div>
		<br>
		<br>
		<table>
		
			<?php
		if(isset($_POST["butse"]))
		{?>
				<tr>
				<th>Index</th>
				<th>Date Of Accession</th>
				<th>Accession No</th>
				<th>Author</th>
				<th>Title</th>
				<th>Publisher</th>
				<th>Year</th>
				<th>No of Pages</th>
				<th>Price</th>	
				<th>Quantity</th>
				<th>SHELF</th>
				
			</tr>
			<?php
			$sql="select books.dateofacc,books.author,books.title,books.publisher,books.year,books.nopages,books.price,books.shelfno,bookacc.accno,bookacc.isissued from books
			inner join bookacc on books.bid=bookacc.bfid  where author like '%{$_POST['se']}%' or accno like '%{$_POST['se']}%' or title like '%{$_POST['se']}%'"; 
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				
				while($ro=$res->fetch_assoc())
				{
					$i=0;
					$sq="select * from bookacc where accno='{$ro['accno']}' and isissued='no'";
					$re=$db->query($sq);
					if($re->num_rows>0)
					{
						$j=0;
						while($rot=$re->fetch_assoc())
						{
							$j++;
						}
					}
					else
					{
						$j=0;
					}
				?>

						<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $ro["dateofacc"];?></td>
			<td><?php echo $ro["accno"];?></td>
			<td><?php echo $ro["author"];?></td>
			<td><?php echo $ro["title"];?></a></td>
			<td><?php echo $ro["publisher"];?></td>
			<td><?php echo $ro["year"];?></td>
			<td><?php echo $ro["nopages"];?></td>
			<td><?php echo $ro["price"];?></td>
			<td><?php echo $j;?></td>
			<td><?php echo $ro["shelfno"];?></td>
			
		</tr>
		<?php $i++;

				}
			} 
			else
			{
				echo "NO RESULT";
			}

		}
	?>

		</table>



</div>
<div class="table">
	<table>
			<?php
		if(isset($_POST["viewse"]))
		{?>
			
			<tr>
				<th>Index</th>
				<th>Date Of Accession</th>
				<th>Accession No</th>
				<th>Author</th>
				<th>Title</th>
				<th>Publisher</th>
				<th>Year</th>
				<th>No of Pages</th>
				<th>Price</th>	
				<th>Quantity</th>
				<th>SHELF</th>
				
			</tr>
			<?php
			$sql="select books.dateofacc,books.author,books.title,books.publisher,books.year,books.nopages,books.price,books.shelfno,bookacc.accno,bookacc.isissued from books
			inner join bookacc on books.bid=bookacc.bfid"; 
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				$i=1;
				while($ro=$res->fetch_assoc())
				{
					
					$sq="select * from bookacc where accno='{$ro['accno']}' and isissued='no'";
					$re=$db->query($sq);
					if($re->num_rows>0)
					{
						$j=0;
						while($rot=$re->fetch_assoc())
						{
							$j++;
						}
					}
					else
					{
						$j=0;
					}
				?>
				<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $ro["dateofacc"];?></td>
			<td><?php echo $ro["accno"];?></td>
			<td><?php echo $ro["author"];?></td>
			<td><?php echo $ro["title"];?></a></td>
			<td><?php echo $ro["publisher"];?></td>
			<td><?php echo $ro["year"];?></td>
			<td><?php echo $ro["nopages"];?></td>
			<td><?php echo $ro["price"];?></td>
			<td><?php echo $j;?></td>
			<td><?php echo $ro["shelfno"];?></td>
			<?php $i++;

				}
			} 
			else
			{
				echo "NO RESULT";
			}

		}
	?>
		</table>
</div>



</center>



</div>
</center>
</body>
</html>

	
