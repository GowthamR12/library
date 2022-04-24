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
		<a href="librarian_view.php"><button class="button">HOME</button></a>
	<div style="background-color:white;opacity:0.9">
	<!-- 	<a href="last_transaction_faculty.php"><button class="button">LAST TRANSACTION OF FACULTY</button></a>
		<a href="last_transaction_student.php"><button class="button">LAST TRANSACTION OF STUDENT</button></a> -->

	<?php

		$sql="select count(*) as count from books inner join bookacc on books.bid=bookacc.bfid";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
			$ro=$res->fetch_assoc();
			echo "<p style='color:black;font-size:40px;background-color:white;padding:30px'>Total Number Of Books In Library=".$ro["count"]."</p>";
		}
	
		?>
		<?php
			$sql="select count(*) as count from books inner join bookacc on books.bid=bookacc.bfid where isissued='no'";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
			$ro=$res->fetch_assoc();
			echo "<p style='color:black;font-size:40px;background-color:white;padding:30px;'>Total Number Of Books In Library Not Issued=".$ro["count"]."</p>";
		}

		?>
			<?php
			$sql="select count(*) as count from books inner join bookacc on books.bid=bookacc.bfid where isissued='yes'";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
			$ro=$res->fetch_assoc();
			echo "<p style='color:black;font-size:40px;background-color:white;padding:30px'>Total Number Of Books In Library Issued=".$ro["count"]."</p>";
		}

		?>

	
	

		<?php 
		$sql="select * from subject";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
					?>
					<center><h1>SUBJECTS</h1></center>

						<center><table>
							<tr>
							<th>SUBJECT</th>
							<th>Total No of Books</th>
							<tr>
						

			<div style="background-color: white;padding: 30px;">
							<?php
			while($ro=$res->fetch_assoc())
			{
				$tql="select count(*) as count from books inner join bookacc on books.bid=bookacc.bfid where subid='{$ro['subid']}'";
				$rq=$db->query($tql);
				if($rq->num_rows>0)
				{
					$roq=$rq->fetch_assoc();
					?>
					<tr>
						<td><?php echo $ro["subject"];?></td>
						<td><?php echo $roq["count"];?></td>
					</tr>
				
				<?php
			}

			}
			?>
		</table>
		</div>

		<div style="background-color: white;padding: 30px;">
			<center><h1 style="color:black">SUBJECT WISE BOOKS</h1>
		<?php
		}

		?>


		<?php 

				$gql="select * from subject ";
				$gq=$db->query($gql);
				if($gq->num_rows>0)
				{
					while($goq=$gq->fetch_assoc())
					{
							$gqls="select books.dateofacc,books.author,books.title,books.publisher,books.year,books.nopages,books.price,books.shelfno,bookacc.accno from books
									inner join bookacc on books.bid=bookacc.bfid where books.subid='{$goq['subid']}'";
					$gqs=$db->query($gqls);
					$i=1;
					if($gqs->num_rows>0)
					{
						?>

					
					
					<center><table>

					

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
				
						</tr>
						<?php
								while($gqso=$gqs->fetch_assoc())
								{?>
									<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $gqso["dateofacc"];?></td>
									<td><?php echo $gqso["accno"];?></td>
									<td><?php echo $gqso["author"];?></td>
									<td><?php echo $gqso["title"];?></a></td>
									<td><?php echo $gqso["publisher"];?></td>
									<td><?php echo $gqso["year"];?></td>
									<td><?php echo $gqso["nopages"];?></td>
									<td><?php echo $gqso["price"];?></td>
								    </tr>
		
		
										<?php
								$i++;
								}?>
									<h1 style="color:black"><?php echo  $goq['subject']; ?></h1>
									<?php
					}




				}
			}


		?>
	</table>

		</div>

</body>
</html>