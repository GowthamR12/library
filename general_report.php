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
		<?php
		}

		?>
		</div>

</body>
</html>