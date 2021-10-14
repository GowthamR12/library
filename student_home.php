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
	<meta name="viewpot" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body class="body">
	<center>

<h1 style="color:red;text-align:center;display:inline-block">MY BOOKS</h1>
<div style="margin-left: 200px;display:inline-block">
		<p>Hello,<?php echo $_SESSION["NAME"];?></p>
		<a href="logout.php"><button class="button">LOGOUT</button></a>

	</div>
	<div>		<table>
		
			<?php
				$sql="select * from stud_book_issue where sid='{$_SESSION['ID']}' and ret_stat=0";
				$res=$db->query($sql);
				if($res->num_rows>0)
				{?><caption>Present Books</caption>
						<tr>
			<th>ACCESSION NUMBER</th>
			<th>ISSUED</th>
			<th>DUE</th>
			</tr><?php
					while($ro=$res->fetch_assoc())
					{?>
						<tr>
						<td><?php echo $ro["book_acc"]; ?></td>
						<td><?php echo $ro["issue_date"]; ?></td>
						<td><?php echo "<strong><font color='red'>".$ro["actual"]; ?></td>
						</tr>
					<?php
					}

				}
				else
				{
					echo "No New Books..";
				}


			?>
	
		
		</table>
	</div><br><br><br>
<div>

			<table>
	
			<?php
				$sql="select * from stud_book_issue where sid='{$_SESSION['ID']}' and ret_stat=1";
				$res=$db->query($sql);
				if($res->num_rows>0)
				{?>
						<tr>
			<th>ACCESSION NUMBER</th>
			<th>ISSUED</th>
			<th>RETURNED</th>
			<th>FINE</th>

		</tr><?php
					while($ro=$res->fetch_assoc())
					{?>
						<tr>
						<td><?php echo $ro["book_acc"]; ?></td>
						<td><?php echo $ro["issue_date"]; ?></td>
						<td><?php echo $ro["returned"]; ?></td>
						<td><?php echo $ro["fine_status"];?></td>
						</tr>
					<?php
					}

				}
				else
				{
					echo "No Books";
				}


			?>
	
		
		</table>
</div>
</body>
</html>